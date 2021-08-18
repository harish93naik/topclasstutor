<?php

namespace App\Http\Controllers\Mentee;
use Illuminate\Http\Request;
use Stripe;
use Session;
use App\Models\PaymentTransaction;
use App\Models\Booking;
use App\Models\Mentee;
use App\Http\Controllers\Controller;
use App\Models\Invoice;

class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('stripe');
    }
  
    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
       
       $stripe = new \Stripe\StripeClient(
  'sk_test_51JJxjTSA5lh0TiF1uJs4FZud97yTEoUKzIzyGx4tXJY9ZhqEICOXhQnxkAWx7HWgqwP7bSXmWuaVQx7EwHnWJG7500GGAjuFzY'
);
$stripe_details=$stripe->tokens->create([
  'card' => [
    'number' => $request->form['card_number'],
    'exp_month' => $request->form['month'],
    'exp_year' => $request->form['year'],
    'cvc' => $request->form['cvv'],
  ],
]);



        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $response=Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "inr",
                "source" => $stripe_details->id,
                "description" => "Making test payment." 
        ]);

        /*Session::put('amount', $request->get('amount'));

        Session::put('mentor_id', $request->get('mentor_id'));

        Session::put('scheduled_date', $request->get('scheduled_date'));

        Session::put('scheduled_time', $request->get('scheduled_time'));

        Session::put('mentor_id', $request->get('mentor_id'));*/

        $mentee_details = Mentee::where('user_id',$request->get('user_id'))->first();

        /*Session::put('mentee_id',$mentee_details->mentee_id);*/


          if($response->status=="succeeded"){

             $booking_array=[];
            $payment_array=[];
            $invoice_array=[];

            //Creating Booking information

            $booking_array['mentor_id']=$request->get('mentor_id');
            $booking_array['mentee_id'] = $mentee_details->mentee_id;
            $booking_array['schedule_time'] = $request->get('scheduled_time');
            $booking_array['schedule_date'] = $request->get('scheduled_date');
            $booking_array['slot_id'] = $request->get('slot_id');
            $booking_array['status'] = 'pending';

            $booking_details = Booking::create($booking_array);

            //Creating Transaction information

            $payment_array['booking_id'] = $booking_details->booking_id;
            $payment_array['payer_id']=$response->id;
            $payment_array['payment_id']=$stripe_details->id;
            $payment_array['amount'] = $request->get('amount');
            $payment_array['token'] = $stripe_details->id;

            $payment_transaction=PaymentTransaction::create($payment_array);

            //Creating Invoice information

            $invoice_array['booking_id'] = $booking_details->booking_id;
            $invoice_array['amount'] = $request->get('amount');
            $invoice_array['status'] = 'success';

            $invoice_details = Invoice::create($invoice_array);



           // \Session::put('success','Payment success !!');

            return redirect('/mentee/booking-success/'.$invoice_details->invoice_id);
        
  
        //Session::flash('success', 'Payment has been successfully processed.');

      }
          
        return redirect('/mentee/mentor');
    }
}