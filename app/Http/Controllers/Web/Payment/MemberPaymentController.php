<?php

namespace App\Http\Controllers\Web\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyInformation;
use App\Mail\RegistrationPayment;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use App\Models\User;
use Stripe;
use Mail;
class MemberPaymentController extends Controller
{
    public function payment(Request $request){
        $userData = [
            'organization_name' => $request->organization_name,
            'phone_number' => $request->phone_number,
            'website_address' => $request->website_address,
            'number_of_employees' => $request->number_of_employees,
            'billing_email' => $request->billing_email,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_state' => $request->billing_state,
            'billing_zip' => $request->billing_zip,
            'billing_country' => $request->billing_country,
            'billing_address_check' => $request->address_check,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'primary_phone' => $request->primary_phone,
            'email' => $request->email,
            'membership_level' => $request->membership_level,
            'about_organization' => $request->about_organization,
            'ownership_structure' => $request->ownership_structure,
            'reason_joining' => $request->reason_joining,
        ];
        session()->put('userMemberData', $userData);

        $amount = intval(preg_replace('/[^0-9]+/', '', $request->membership_level));
        if($amount<0.50){
            return redirect()->back()->with('error','Stripe requires a minimum transaction amount of $0.50.');
        }
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $stripe = Stripe\Charge::create([
                "amount" => $amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => 'Congratulations! You have received a new payment for membership creation.'
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
                    'member'=>1,
                ]);
            }else{
                $user = User::create([
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                    'type'=>1,
                    'member'=>1,
                ]);
            }
            CompanyInformation::create([
                'user_id' => $user->id,
                'organization_name' => $request->organization_name,
                'phone_number' => $request->phone_number,
                'website_address' => $request->website_address,
                'number_of_employees' => $request->number_of_employees,
                'billing_email' => $request->billing_email,
                'billing_address' => $request->billing_address,
                'billing_city' => $request->billing_city,
                'billing_state' => $request->billing_state,
                'billing_zip' => $request->billing_zip,
                'billing_country' => $request->billing_country,
                'billing_address_check' => $request->address_check,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'primary_phone' => $request->primary_phone,
                'email' => $request->email,
                'membership_level' => $request->membership_level,
                'about_organization' => $request->about_organization,
                'ownership_structure' => $request->ownership_structure,
                'reason_joining' => $request->reason_joining,
            ]);
            PaymentModel::create([
                'user_id'=>$user->id,
                'trx_id'=>$stripe['id'],
                'amount'=>$amount,
                'type'=>1,
            ]);
            $data['name'] = $request->first_name;
            $data['message'] = "Congratulations! You have successfully joined the membership program. Your payment has been received. Transaction ID is #" . $stripe['id'];
            $email = $request->email;
            Mail::to($email)->send(new RegistrationPayment($data));
            session()->forget('userMemberData');
            if(isset(Auth::user()->id)){
                return redirect()->route('web.user-dashboard')->with('success','Congratulations! You have successfully joined the membership program. Transaction ID is #'.$stripe['id']);
            }
            return redirect()->back()->with('success','Congratulations! You have successfully joined the membership program. Transaction ID is #'.$stripe['id']);
        } else{
            return redirect()->back()->with('error','Oops! Something went wrong please try again.');
        }       
    }
}
