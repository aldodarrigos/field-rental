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

use App\Models\{Product, Sale, User};

use App\Mail\BookingMailable;
use Illuminate\Support\Facades\Mail;
 
class ProductsController extends Controller
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

        $static_price = $request->input('static_price');
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $final_price = $request->input('product_price');
        $product_size_id = $request->input('product_size_id');
        $product_size_text = $request->input('product_size_text');
        $product_status = $request->input('product_status');
        $product_quantity = $request->input('product_quantity');
        $user_id = $request->input('user_id');

        $description = $product_name.' / '.$final_price.' / '.$product_size_text.' / '.$product_quantity;

        // After Step 2
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($final_price);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($description);

        $shop_data = json_encode(array(
            'user_id' => $user_id, 
            'product_id' => $product_id, 
            'product_name' => $product_name, 
            'static_price' => $static_price, 
            'final_price' => $final_price, 
            'product_size_id' => $product_size_id, 
            'product_size_text' => $product_size_text, 
            'product_status' => $product_status, 
            'product_quantity' => $product_quantity
        ));
        $transaction->setCustom($shop_data);

        $callbackUrl = url('product-payment-status');
        $failedUrl = url('product-payment-success');
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
            
            $sale = new Sale();
            $sale_code = str_replace( array( '-', ':' ), '', $custom->user_id.'-'.$custom->product_id.'-'.date('Y-m-d')); 

            $sale->user_id = $custom->user_id;
            $sale->product_id = $custom->product_id;
            $sale->size = $custom->product_size_text;
            $sale->quantity = $custom->product_quantity;
            $sale->price_unit = $custom->static_price;
            $sale->final_price = $custom->final_price;
            $sale->payment_code = $response->id;
            $sale->code = $sale_code;

            $sale->save();

            //$reservation = Reservation::where('id', 5)->first();
            $product = Product::where('id', $sale->product_id)->first();
            $user = User::where('id', $sale->user_id)->first();

            $success = $this->successbooking($user->email, $sale->id);

            return redirect('product-payment-success')->with(['sale' => $sale, 'product' => $product, 'user' => $user]);
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
        
        return view('frontend/success/product', ['seo' => $seo]);
    }

    public function successbooking($contact = null, $sale_id = null)
    {

        $correo = new BookingMailable($contact, $sale_id);
        Mail::to($contact)->send($correo);
        
    }




}
