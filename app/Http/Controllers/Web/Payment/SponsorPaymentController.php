<?php

namespace App\Http\Controllers\Web\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Event_Request_Type;
use App\Mail\RegistrationPayment;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use App\Models\SponsorUser;
use App\Models\User;
use Mail;
use Stripe;
class SponsorPaymentController extends Controller
{
    public function payment(Request $request){
        $userData = [
            'sponsor_name' => $request->sponsor_name,
            'contact_person_name' => $request->contact_person_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'website_url' => $request->website_url,
            'industry_sector' => $request->industry_sector,
            'specific_interest' => $request->specific_interest,
            'geographic_focus' => $request->geographic_focus,
            'sponsorship_level' => $request->sponsorship_level,
            'sponsorship_goals' => $request->sponsorship_goals,
            'sponsorship_experiences' => $request->sponsorship_experiences,
            'sponsorship_preferences' => $request->sponsorship_preferences,
            'sponsorship_budget' => $request->sponsorship_budget,
            'payment_schedule' => $request->payment_schedule,
            'additional_support' => $request->additional_support,
            'hear_about' => $request->hear_about,
            'data_protection_consent' => $request->data_protection_consent,
        ];
        session()->put('sponsorData', $userData);
        
        $amount = Event_Request_Type::where('id',4)->first('fee');
        if($amount->fee<0.50){
            return redirect()->back()->with('error','Stripe requires a minimum transaction amount of $0.50.');
        }
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $stripe = Stripe\Charge::create([
                "amount" => $amount->fee * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => 'Congratulations! You have successfully joined the sponsorship.'
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $payment['error'] = $e->getMessage();
        } catch (\Exception $e) {
            $payment['error'] = $e->getMessage();
        }
        if(!empty($payment['error'])){
            return redirect()->back()->with('error', $payment['error']);
        }
        if($stripe['status'] == 'succeeded'){  
            if(isset(Auth::user()->id)){
                $user = Auth::user();
                User::where('id',$user->id)->update([
                    'sponsor'=>1,
                ]);
            }else{
                $user = User::create([
                    'first_name'=>$request->contact_person_name,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                    'type'=>1,
                    'sponsor'=>1,
                ]);
            }
            SponsorUser::create([
                'user_id' => $user->id,
                'sponsor_name' => $request->sponsor_name,
                'contact_person_name' => $request->contact_person_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'website_url' => $request->website_url,
                'industry_sector' => $request->industry_sector,
                'specific_interest' => $request->specific_interest,
                'geographic_focus' => $request->geographic_focus,
                'sponsorship_level' => $request->sponsorship_level,
                'sponsorship_goals' => $request->sponsorship_goals,
                'sponsorship_experiences' => $request->sponsorship_experiences,
                'sponsorship_preferences' => $request->sponsorship_preferences,
                'sponsorship_budget' => $request->sponsorship_budget,
                'payment_schedule' => $request->payment_schedule,
                'additional_support' => $request->additional_support,
                'hear_about' => $request->hear_about,
                'data_protection_consent' => $request->data_protection_consent,
            ]);
            PaymentModel::create([
                'user_id'=>$user->id,
                'trx_id'=>$stripe['id'],
                'amount'=>$amount->fee,
                'type'=>4,
            ]);
            $data['name'] = $request->contact_person_name;
            $data['message'] = "Congratulations! You have successfully joined the sponsorship. Your payment has been recieved Transaction ID is #".$stripe['id'];
            $email = $request->email;
            Mail::to($email)->send(new RegistrationPayment($data));
            session()->forget('sponsorData');
            if(isset(Auth::user()->id)){
                return redirect()->route('web.user-dashboard')->with('success','Congratulations! You have successfully joined the sponsorship. Transaction ID is #'.$stripe['id']);
            }
            return redirect()->back()->with('success','Congratulations! You have successfully joined the sponsorship. Transaction ID is #'.$stripe['id']);
        } else {
            return redirect()->back()->with('error', 'Payment failed.');
        }
        return redirect()->back()->with('error', 'Payment failed.');
    } 
}
