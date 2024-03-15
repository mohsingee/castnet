<?php

namespace App\Http\Controllers\Web\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EventRequestForm;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use Stripe;
class EventPaymentController extends Controller
{
    public function payment(Request $request){
        $userData = [
            'title' => $request->title,
            'event_category' => $request->event_category,
            'event_info' => $request->event_info,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'event_req_type' => $request->event_req_type,
            'event_cost' => $request->event_cost,
            'event_fee' => $request->event_fee,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'event_location' => $request->event_location,
            'event' => $request->event,
        ];
        session()->put('eventRequestData', $userData);
        
        $amount = intval(preg_replace('/[^0-9]+/', '', $request->event_fee));
        if($amount<0.50){
            return redirect()->back()->with('error','Stripe requires a minimum transaction amount of $0.50.');
        }
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $stripe = Stripe\Charge::create([
                "amount" => $amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => 'Congratulations! You have received a new payment for event creation.'
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
            EventRequestForm::create([
                'title' => $request->title,
                'event_category' => $request->event_category,
                'event_info' => $request->event_info,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'event_req_type' => $request->event_req_type,
                'event_cost' => $request->event_cost,
                'event_fee' => $request->event_fee,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'event_location' => $request->event_location,
                'event' => $request->event,
            ]);
            PaymentModel::create([
                'user_id'=>Auth::user()->id,
                'trx_id'=>$stripe['id'],
                'amount'=>$request->event_fee,
                'type'=>2,
            ]);
            session()->forget('eventRequestData');
            return redirect()->back()->with('success','Congratulations! Event Request created successfully. Transaction ID is #'.$stripe['id']);
        } else{
            return redirect()->back()->with('error','Oops! Something went wrong please try again.');
        } 
    } 
}
