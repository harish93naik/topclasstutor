<?php

namespace App\Http\Controllers\Mentee;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ZoomMeetingController;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
//use Date;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Refund;
use PayPal\Api\Sale;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RefundRequest;
use PayPal\Api\Transaction;
use App\Models\PaymentTransaction;
use App\Models\Booking;
use App\Models\Mentee;
use App\Models\Invoice;
use App\Traits\ZoomMeetingTrait;
use App\Models\ZoomMeeting;
use App\Models\BookingTimings;
use File;
/*use PDF;
use View;*/



class PaypalController extends Controller
{
    
    private $_api_context;
    
    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(50);
           /* ->setPrice($request->get('payment_amount'));*/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            /*->setTotal($request->get('payment_amount'));*/
             ->setTotal(50);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return redirect('/mentee/mentor');                
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return redirect('/mentee/mentor');                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        
        
        Session::put('paypal_payment_id', $payment->getId());

        Session::put('amount', $request->get('payment_amount'));

        Session::put('mentor_id', $request->get('mentor_id'));

        Session::put('scheduled_start_time', $request->get('scheduled_start_time'));

        Session::put('scheduled_end_time', $request->get('scheduled_end_time'));

        Session::put('event_id', $request->get('event_id'));

        Session::put('duration',$request->get('duration'));

        //Session::put('mentor_id', $request->get('mentor_id'));

        $mentee_details = Mentee::where('user_id',$request->get('user_id'))->first();

        Session::put('mentee_id',$mentee_details->mentee_id);



        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
    	return redirect('/mentee/mentor');
    }

    public function getPaymentStatus(Request $request)
    {
        $zoomMeeting = new ZoomMeetingController;        
        $payment_id = Session::get('paypal_payment_id');
        $amount = Session::get('amount');

        $mentor_id = Session::get('mentor_id');
        $mentee_id = Session::get('mentee_id');
        $scheduled_start_time = Session::get('scheduled_start_time');
        $scheduled_end_time = Session::get('scheduled_end_time');
        $duration = Session::get('duration');
        $event_id = Session::get('event_id');
       // $payment_id=$_GET['paymentId'];

        Session::forget('paypal_payment_id');
        Session::forget('mentor_id');
        Session::forget('mentee_id');
        Session::forget('scheduled_start_time');
        Session::forget('scheduled_end_time');
        Session::forget('duration');
        Session::forget('event_id');

        Session::forget('amount');
       if (empty($request->input('PayerID')) || empty($request->input('token'))) {

            \Session::put('error','Payment fail');
            return redirect('/mentee/mentor');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);        
        $result = $payment->execute($execution, $this->_api_context);

        
        //var_dump($test_sale);
        
        if ($result->getState() == 'approved') {  

            $booking_array=[];
            $payment_array=[];
            $invoice_array=[];

            $sale_transact = $result->getTransactions();
            $sale_id = $sale_transact[0]->getRelatedResources()[0]->getSale()->getId();

            //Creating Booking information

         //$home = new HomeController;
       // $time = $scheduled_time;
        //$original_time = substr($time, 0, 1);
       //$this->getActualTime($original_time);
        
        /*$original_date = $scheduled_date;
        $s = $original_date.' '.$time.':00:00';
        
      
        $date_dd = strtotime($s);
        
        $date = date('Y-m-d\TH:i:s',$date_dd);*/

      

        /*$zoom_meeting_date = $date;

        $zoom_meeting['topic'] = "Topclasstutors Test";
        $zoom_meeting['start_time'] = $zoom_meeting_date;
        $zoom_meeting['duration'] = 60;
        $zoom_meeting['agenda'] = "Tutoring";
        $zoom_meeting['host_video'] = 1;
        $zoom_meeting['participant_video'] = 1;*/
        $zoom_data = $zoomMeeting->store($scheduled_start_time,$scheduled_end_time,$duration); //$this->create($zoom_meeting->all());



            $booking_array['meeting_id'] = $zoom_data['data']['id'];
            $booking_array['meeting_uuid'] = $zoom_data['data']['uuid'];
            $booking_array['meeting_url'] = $zoom_data['data']['join_url'];
            $booking_array['mentor_id']=$mentor_id;
            $booking_array['mentee_id'] = $mentee_id;
           /* $booking_array['schedule_time'] = $scheduled_time;
            $booking_array['schedule_date'] = $scheduled_date;*/
            $booking_array['event_id'] = $event_id;
            $booking_array['status'] = 'accept';

            $booking_details = BookingTimings::create($booking_array);

        //Creating Zoom meeting table 

            $start_time =date('Y-m-d H:i:s', strtotime($zoom_data['data']['start_time']));
            $end_date = date('Y-m-d H:i:s', strtotime($zoom_data['data']['start_time'] . ' +1 hour'));

            $meeting_array['meeting_id'] = $zoom_data['data']['id'];
            $meeting_array['booking_id'] = $booking_details->event_booking_id;

            $meeting_array['start_time'] = $start_time;

            $meeting_array['end_time'] = $end_date;
           

            $meeting_details = ZoomMeeting::create($meeting_array);

            //Creating Transaction information

            $payment_array['booking_id'] = $booking_details->event_booking_id;
            $payment_array['payer_id']=$request->input('PayerID');
            $payment_array['payment_id']=$payment_id;
            $payment_array['amount'] = $amount;
            $payment_array['token'] = $request->input('token');
            $payment_array['payment_method'] ="paypal";
            $payment_array['sale_id'] = $sale_id;   
            $payment_transaction=PaymentTransaction::create($payment_array);

            //Creating Invoice information

            $invoice_array['booking_id'] = $booking_details->event_booking_id;
            $invoice_array['amount'] = $amount;
            
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
            




            /*$sale = Sale::get($sale_id, $this->_api_context);        
            $refund_request = new RefundRequest();
        //$refund_request->setPayerId($_GET['PayerID']);        
            $refund_status = $sale->refundSale($refund_request, $this->_api_context);

            var_dump($refund_status);*/

            //var_dump($booking_array);

            //return view('meeting',$booking_array);

           \Session::put('success','Payment success !!');

            return redirect('/mentee/booking-success/'.$invoice_details->invoice_id);
        }
            

        \Session::put('error','Payment failed !!');
		return redirect('/mentee/mentor');
    }
}