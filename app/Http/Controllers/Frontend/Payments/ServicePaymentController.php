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

use App\Models\{ServiceRegistration, User, Service};

use App\Mail\BookingMailable;
use Illuminate\Support\Facades\Mail;
 
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
        $service_name = $request->input('service_name');
        $service_price = $request->input('service_price');
        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');

        $description = $service_name.' / '.$service_price.' / '.$user_name;

        // After Step 2
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($service_price);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($description);


        $registration_id = $request->input('registration_id');
        $service_name = $request->input('service_name');
        $service_price = $request->input('service_price');
        $user_name = $request->input('user_name');

        $shop_data = json_encode(array(
            'registration_id' => $registration_id, 
            'user_id' => $user_id, 
        ));
        $transaction->setCustom($shop_data);

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

            /*
            'user_id' => $userIdLogin, 
            'product_id' => $product_id, 
            'product_name' => $product_name, 
            'static_price' => $static_price, 
            'final_price' => $final_price, 
            'product_size' => $product_size, 
            'product_status' => $product_status, 
            'product_quantity' => $product_quantity
            */
            
            $registration = ServiceRegistration::find($custom->registration_id);

            $registration->payment_code = $response->id;
            $registration->status = 1;

            $registration->save();


            $user = User::where('id', $custom->user_id)->first();
            $service = User::where('id', $registration->service_id)->first();

            //$success = $this->successbooking($user->email, $registration->id);

            return redirect('service-payment-success')->with(['registration' => $registration, 'service' => $service, 'user' => $user]);
        }
        
    }


    public function fail()
    {
        //Está función será la que se ejecute si se cancela el pago, puedes redirigir a la vista anterior, mostrar un mensaje, etc
    }

    public function success()
    {

        /*
        $reservation = Reservation::where('id', 5)->first();
        $field = Field::where('id', $reservation->field_id)->first();
        $user = User::where('id', $reservation->user_id)->first();
        */

        
        $seo = ['title' => 'Successful purchase | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];
        
        return view('frontend/success/service', ['seo' => $seo]);
    }

    public function successbooking($contact = null, $sale_id = null)
    {

        $correo = new BookingMailable($contact, $sale_id);
        Mail::to($contact)->send($correo);
        
    }




}
