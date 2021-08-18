<?php

namespace App\Http\Controllers\Mentee;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Models\PaymentTransaction;
use App\Models\Booking;
use App\Models\Mentee;
use App\Models\Invoice;

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
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

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

        Session::put('amount', $request->get('amount'));

        Session::put('mentor_id', $request->get('mentor_id'));

        Session::put('scheduled_date', $request->get('scheduled_date'));

        Session::put('scheduled_time', $request->get('scheduled_time'));

        Session::put('slot_id', $request->get('slot_id'));

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
        $payment_id = Session::get('paypal_payment_id');
        $amount = Session::get('amount');

        $mentor_id = Session::get('mentor_id');
        $mentee_id = Session::get('mentee_id');
        $scheduled_time = Session::get('scheduled_time');
        $scheduled_date = Session::get('scheduled_date');
        $slot_id = Session::get('slot_id');
       // $payment_id=$_GET['paymentId'];

        Session::forget('paypal_payment_id');
        Session::forget('mentor_id');
        Session::forget('mentee_id');
        Session::forget('scheduled_time');
        Session::forget('scheduled_date');
        Session::forget('slot_id');

        Session::forget('amount');
       if (empty($request->input('PayerID')) || empty($request->input('token'))) {

            \Session::put('error','Payment fail');
            return redirect('/mentee/mentor');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {  

            $booking_array=[];
            $payment_array=[];
            $invoice_array=[];

            //Creating Booking information

            $booking_array['mentor_id']=$mentor_id;
            $booking_array['mentee_id'] = $mentee_id;
            $booking_array['schedule_time'] = $scheduled_time;
            $booking_array['schedule_date'] = $scheduled_date;
            $booking_array['slot_id'] = $slot_id;
            $booking_array['status'] = 'pending';

            $booking_details = Booking::create($booking_array);

            //Creating Transaction information

            $payment_array['booking_id'] = $booking_details->booking_id;
            $payment_array['payer_id']=$request->input('PayerID');
            $payment_array['payment_id']=$payment_id;
            $payment_array['amount'] = $amount;
            $payment_array['token'] = $request->input('token');

            $payment_transaction=PaymentTransaction::create($payment_array);

            //Creating Invoice information

            $invoice_array['booking_id'] = $booking_details->booking_id;
            $invoice_array['amount'] = $amount;
            $invoice_array['status'] = 'success';

            $invoice_details = Invoice::create($invoice_array);



           // \Session::put('success','Payment success !!');

            return redirect('/mentee/booking-success/'.$invoice_details->invoice_id);
        }
            

        \Session::put('error','Payment failed !!');
		return redirect('/mentee/mentor');
    }
}