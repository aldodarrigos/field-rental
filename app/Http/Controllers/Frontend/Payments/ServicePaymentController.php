<?php

namespace App\Http\Controllers\Frontend\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use App\Models\{ServiceRegistration, Setting};

use App\Mail\ServicesMailable;
use Illuminate\Support\Facades\Mail;
use DB;

class ServicePaymentController extends Controller
{

    private $apiContext;

    public function __construct(){

        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],     // ClientID
                $payPalConfig['secret']      // ClientSecret
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);

    }

    public function payment(Request $request)
    {

        $registration_id = $request->input('registration_id');
        $service_name = $request->input('event_name');
        $registration_price = $request->input('final_price');
        $user_name = $request->input('user_name');
        $user_email = $request->input('user_email');

        $description = $service_name.' / '.$user_name;

        // After Step 2
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($registration_price);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($description);

        $registration_data = json_encode(array(
            'registration_id' => $registration_id, 
            'user_email' => $user_email, 
        ));
        $transaction->setCustom($registration_data);

        $callbackUrl = url('service-payment-status');
        $failedUrl = url('service-payment-success');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($failedUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        // After Step 3
        try {
            $payment->create($this->apiContext);
            //echo $payment;

            return redirect()->away($payment->getApprovalLink());
        }
        catch (PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }

    }

    public function status(Request $request)
    {
        //dd($request->all());
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if(!$paymentId or !$payerId or !$token){
            $status = 'No se pudo procesar el pago a través de Paypal.';
            return redirect('product-payment-fail');
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        //Execute the payment
        $result = $payment->execute($execution, $this->apiContext);
        //dd($result);
        
        if($result->getState()==='approved'){

            $response = json_decode($result);
            $custom = json_decode($response->transactions[0]->custom);
            
            $registration = ServiceRegistration::find($custom->registration_id);

            $registration->payment_code = $response->id;
            $registration->status = 1;
            $registration->save();

            $success = $this->successbooking($custom->user_email, $custom->registration_id);

            return redirect('service/confirmation/'.$custom->registration_id);
        }
        
    }


    public function fail()
    {
        //Está función será la que se ejecute si se cancela el pago, puedes redirigir a la vista anterior, mostrar un mensaje, etc
    }



    public function successbooking($contact = null, $reg_id = null)
    {

        $admin_email = Setting::first()->email;

        $confirmation = new ServicesMailable($contact, $reg_id);
        Mail::to($contact)->send($confirmation);

        $copy = new ServicesMailable($contact, $reg_id);
        Mail::to($admin_email)->send($copy);

        
    }




}
