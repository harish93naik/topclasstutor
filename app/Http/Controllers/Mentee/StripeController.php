<?php

namespace App\Http\Controllers\Mentee;
use Illuminate\Http\Request;
use Stripe;
use Session;
use App\Models\PaymentTransaction;
use App\Http\Controllers\ZoomMeetingController;
use App\Models\Booking;
use App\Models\Mentee;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Traits\ZoomMeetingTrait;
use App\Models\ZoomMeeting;
use App\Models\BookingTimings;

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
    $stripe->applepaydomains->create([
      'domain_name' => 'https://2c3e-49-207-215-81.ngrok.io',
    ]);

   $amount = $request->get('payment_amount');
    

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
            $zoomMeeting = new ZoomMeetingController;

             $booking_array=[];
            $payment_array=[];
            $invoice_array=[];

            $scheduled_start_time =  $request->get('scheduled_start_time');
            $scheduled_end_time = $request->get('scheduled_end_time');
            $duration = $request->get('duration');

            $zoom_data = $zoomMeeting->store($scheduled_start_time,$scheduled_end_time,$duration);

            //Creating Booking information

            $booking_array['mentor_id']=$request->get('mentor_id');
            $booking_array['mentee_id'] = $mentee_details->mentee_id;
            /*$booking_array['schedule_time'] = $request->get('scheduled_start_time');//$request->get('scheduled_time');
            $booking_array['schedule_date'] = $request->get('scheduled_end_time');//$request->get('scheduled_date');*/
            $booking_array['event_id'] = $request->get('event_id');
            $booking_array['status'] = 'accept';
            $booking_details = BookingTimings::create($booking_array);

            //Meeting information

             $start_time =date('Y-m-d H:i:s', strtotime($zoom_data['data']['start_time']));
            $end_date = date('Y-m-d H:i:s', strtotime($zoom_data['data']['start_time'] . ' +1 hour'));

            $meeting_array['meeting_id'] = $zoom_data['data']['id'];
            $meeting_array['booking_id'] = $booking_details->event_booking_id;

            $meeting_array['start_time'] = $start_time;

            $meeting_array['end_time'] = $end_date;
           

            $meeting_details = ZoomMeeting::create($meeting_array);

            //Creating Transaction information

            $payment_array['booking_id'] = $booking_details->event_booking_id;
            $payment_array['payer_id']=$response->id;
            $payment_array['payment_id']=$stripe_details->id;
            $payment_array['amount'] = $request->get('payment_amount');
            $payment_array['token'] = $stripe_details->id;
            $payment_array['payment_method'] = "stripe";

            $payment_transaction=PaymentTransaction::create($payment_array);

            //Creating Invoice information

            $invoice_array['booking_id'] =$booking_details->event_booking_id;
            $invoice_array['amount'] = $request->get('payment_amount');
            $invoice_array['status'] = 'success';

            $invoice_details = Invoice::create($invoice_array);


            $invoice = \ConsoleTVs\Invoices\Classes\Invoice::make();

               $invoice->addItem('Video-Call',$amount,1);

              
                $uploads_dir = storage_path('app/public/').'invoices';//public_path().'/storage/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            if(!File::isDirectory($uploads_dir)){
            File::makeDirectory($uploads_dir);

            
                }

           $uploads_dir = storage_path('app/public/').'invoices/'.$booking_details->mentee->user->first_name;//public_path().'/storage/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            if(!File::isDirectory($uploads_dir)){
            File::makeDirectory($uploads_dir);

            
                }
            
              $invoice->number('000'.$invoice_details->invoice_id)
                ->with_pagination(true)
                ->duplicate_header(true)
                ->currency('USD');

              $invoice->logo('assets/img/logo.png');
               
                  $invoice->customer([
                    'name'      => $booking_details->mentee->user->first_name.' '.$booking_details->mentee->user->last_name,
                    'id'        => '000'.$booking_details->mentee->mentee_id,
                    'phone'     => $booking_details->mentee->user->phone_number,
                    'location'  => $booking_details->mentee->address1,
                    'city'=>      $booking_details->mentee->city,
                    'country'   => $booking_details->mentee->country,
                ]);

            $invoice->business([
                 'name'      =>'Topclasstutors.site',
                    'id'        => '000'.$booking_details->mentee->mentee_id,
                    'phone'     => '9802318640, 9745705530',
                    'location'  => 'koteshwor, Kathmandu',
                    'city'=>      'Auckland',
                    'country'   => 'New Zealand',

            ]);

           
                
             $invoice->save('public/invoices/'.$booking_details->mentee->user->first_name.'/'.$booking_details->mentee->user->first_name.'-order-'.$booking_details->events->start.'.pdf');

             
             $invoice_detail=Invoice::where('invoice_id',$invoice_details->invoice_id)->first();

                if($invoice_detail!=null)
                {

               $invoice_detail->invoice_url = '/storage/invoices/'.$booking_details->mentee->user->first_name.'/'.$booking_details->mentee->user->first_name.'-order-'.$booking_details->events->start.'.pdf';
               $invoice_detail->save();

              }
            



           // \Session::put('success','Payment success !!');

            return redirect('/mentee/booking-success/'.$invoice_details->invoice_id);
        
  
        //Session::flash('success', 'Payment has been successfully processed.');

      }
          
        return redirect('/mentee/mentor');
    }

    public function refundAmount(Booking $booking){

          $stripe = new \Stripe\StripeClient(
  'sk_test_51JJxjTSA5lh0TiF1uJs4FZud97yTEoUKzIzyGx4tXJY9ZhqEICOXhQnxkAWx7HWgqwP7bSXmWuaVQx7EwHnWJG7500GGAjuFzY'
);

       $payer_id = Transaction::where("booking_id",$booking_id)->first();

       $response =  $stripe->refunds->create([
  'charge' =>$payer_id->payer_id,
]);


    }

    function demoPayment(Request $request, Response $response) {

       $stripe = new \Stripe\StripeClient(
  'sk_test_51JJxjTSA5lh0TiF1uJs4FZud97yTEoUKzIzyGx4tXJY9ZhqEICOXhQnxkAWx7HWgqwP7bSXmWuaVQx7EwHnWJG7500GGAjuFzY'
);

  $session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'usd',
        'product_data' => [
          'name' => 'T-shirt',
        ],
        'unit_amount' => 2000,
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
  ]);

 // $stripe->run();

  return $response->withHeader('Location', $session->url)->withStatus(303);
}
