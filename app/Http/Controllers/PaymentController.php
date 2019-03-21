<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use App\Bookmassage;
use App\Packages;
use Redirect;
use Session;
use DB;
use URL;

class PaymentController extends Controller
{
    private $_api_context;

    public function getPayment($id)
    {
        $bookmassage = Bookmassage::where("id", $id)->select('fullname','contactno','noofreservation','package')->get();
        return response()->json(['fetchers' => $fetcher]);
    }

    public function __construct()
    {
 
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
 
    }

    public function payWithpaypal(Request $request)
    {
        $data = $request->validate([
            'code' => 'required',
            'user_id' => 'required',
            'contactno' => 'required',
            'from' => 'required',
            'to' => 'required',
            'amount' => 'required',
            'package' => 'required'
            
        ]);
        $amountpackage = Packages::select('price')->where('packagecode', '=', $request->package)->get();
        $plucked = $amountpackage[0]->price;

        $from = date_format(date_create($request->from),"Y-m-d");
        $to = date_format(date_create($request->to),"Y-m-d");
        $time = date_format(date_create($request->time),"H:i:s");
        $bkms = new Bookmassage();
        $bkms->code = $request->code;
        $bkms->user_id = $request->user_id;;
        $bkms->contactno =  $request->contactno;
        $bkms->start_date =  $from.' '.$time;
        $bkms->end_date =  $to.' '.$time;
        $bkms->amount =  $request->amount;
        $bkms->daytime = $request->day;
        $bkms->nighttime = $request->night;
        $bkms->package = $request->package;
        $bkms->status = "Pending";
        $bkms->save();

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
 
        $item_1 = new Item();
 
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('PHP')
            ->setQuantity(1)
            ->setPrice($request->amount); /** unit price **/
 
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
 
        $amount = new Amount();
        $amount->setCurrency('PHP')
            ->setTotal($request->amount);
 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
 
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));
 
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
 
            $payment->create($this->_api_context);
 
        } catch (\PayPal\Exception\PPConnectionException $ex) {
 
            if (\Config::get('app.debug')) {
 
                \Session::put('error', 'Connection timeout');

                return Redirect::to('/');
 
            } else {
 
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');
 
            }
 
        }
 
        foreach ($payment->getLinks() as $link) {
 
            if ($link->getRel() == 'approval_url') {
 
                $redirect_url = $link->getHref();
                break;
 
            }
 
        }
 
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
 
        if (isset($redirect_url)) {
 
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
 
        }
 
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
 
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            \Session::put('error', 'Payment failed');
            $paypalamount = Bookmassage::latest()->limit(1)->delete();  
            
            return Redirect::to('/');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            \Session::put('success', 'Payment success');
            DB::table('Bookmassages')
            ->latest()
            ->limit(1)
            ->update(['status' => "Paid"]);
            $resort = Bookmassage::orderBy('id','desc')->latest()->limit(1)->get();
            return Redirect::to('/');

        }

        \Session::put('error', 'Payment failed');
        $resort = Bookmassage::orderBy('id','desc')->latest()->limit(1)->get();
            return Redirect::to('/');
    }
}
