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

use App\Models\{Field, Reservation, User, Content, Setting};

use App\Mail\BookingMailable;
use Illuminate\Support\Facades\Mail;
 
class FieldsPaymentController extends Controller
{

    private $apiContext;

    public function __construct(){

        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],     // ClientID
                $payPalConfig['secret']   // ClientSecret
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);

    }

    public function fieldsrental(Request $request)
    {
        $map = Content::where('id', 11)->first();
        $fields_select = Field::where('status', 1)->orderBy('number', 'ASC')->get();
        $hot_hours = ['18:00', '19:00', '20:00', '21:00', '22:00'];
        $hours = ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'];
        //$hours = ['10:00'=>'10 AM', '11:00'=>'11 AM', '12:00'=>'12 AM', '13:00'=>'1 PM', '14:00'=>'2 PM', '15:00'=>'3 PM', '16:00'=>'4 PM', '17:00'=>'5 PM', '18:00'=>'6 PM', '19:00'=>'7 PM', '20:00'=>'8 PM', '21:00'=>'9 PM', '22:00'=>'10 PM'];
        $hoursarray = array();

        $players_number = '';
        $field_id = '';
        $date = '';

        if($request->input('field')){
            $field_id = $request->input('field');
            $players_number = $request->input('players_number');
            $date = $request->input('date');
            $field = Field::where('id', $field_id)->first();
            $reservations = Reservation::where([
                ['field_id', $field->id],
                ['res_date', $date]
            ])->get();

        
            foreach($hours as $item){

                if((date('N', strtotime($date)) >= 6)){
                    $price = $field->price_weekend;
                    $price_alt = $field->price_weekend_alt;
                }else{
                    if(in_array($item, $hot_hours)){
                        $price = $field->price_night;
                        $price_alt = $field->price_night_alt;
                    }else{
                        $price = $field->price_regular;
                        $price_alt = $field->price_regular_alt;
                    }
                }

                if($this->check_hours($item, $field->id, $date)){
                    array_push($hoursarray, 
                    ['hour' => $item, 
                    'class' => 'taken',
                    'price' => $price,
                    'price_alt' => $price_alt
                    ]);
                }else{
                    array_push($hoursarray, [
                        'hour' => $item, 
                        'class' => 'noselect',
                        'price' => $price,
                        'price_alt' => $price_alt
                        ]);
                }
            }

            $result = 1;

        }else{
            $field = 0;
            $reservations = 0;
            $date = 0;
            $result = 0;
        }

        $setting = Setting::first();

        $seo = ['title' => 'Booking | KISC, Sports complex', 
        'sumary' => 'Book now', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/fieldsrental', ['seo' => $seo, 'result' => $result, 'field' => $field, 'field_id' => $field_id, 'date' => $date, 'fields_select' => $fields_select, 'reservations' => $reservations, 'hoursarray' => $hoursarray, 'players_number' => $players_number, 'map' => $map, 'setting' => $setting]);
        
    }

    
    public function check_hours($hour, $field, $date){

        $reservations = Reservation::where([
            ['field_id', $field],
            ['res_date', $date]
        ])->get();

        foreach($reservations as $item){
            if($hour == $item->hour){
                return true;
                break;
            }
        }
    }

    public function payment(Request $request)
    {
    
        $dateSelected = $request->input('dateSelected');
        $field_id = $request->input('fieldIdSelected');
        $fieldShortName = $request->input('fieldShortName');
        $field_name = $request->input('fieldSelectedName');
        $bookingArray = $request->input('bookingArray');
        $totalPrice = $request->input('totalPrice');
        $userIdLogin = $request->input('userIdLogin');

        $description = $field_name.' / '.$dateSelected;

        // After Step 2
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($totalPrice);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($description);

        $reservation_data = json_encode(array(
            'user_id' => $userIdLogin, 
            'field_id' => $field_id, 
            'field_short_name' => $fieldShortName, 
            'field_name' => $field_name, 
            'price' => $totalPrice, 
            'date' => $dateSelected,
            'array' => $bookingArray
        ));
        $transaction->setCustom($reservation_data);

        $callbackUrl = url('paypal/status');
        $failedUrl = url('paypal/failed');
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

    public function payPalStatus(Request $request)
    {
        //dd($request->all());
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if(!$paymentId or !$payerId or !$token){
            $status = 'No se pudo procesar el pago a través de Paypal.';
            return redirect('paypal/failed');
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
            $booking_array = json_decode($custom->array);

            $code = str_replace( array( '-', ':' ), '', $custom->field_short_name.$custom->date.rand(1000,9999)); 

            for ($i=0; $i < count($booking_array) ; $i++) { 

                $reservation = new Reservation();
                
                $reservation->user_id = $custom->user_id;
                $reservation->code = $code;
                $reservation->field_id = $custom->field_id;
                $reservation->res_date = $custom->date;
                $reservation->hour = $booking_array[$i][0];
                $reservation->price = $booking_array[$i][1];
                $reservation->conf_code = $response->id;
    
                $reservation->save();

            }

            $field = Field::where('id', $custom->field_id)->first();
            $user = User::where('id', $custom->user_id)->first();

            $success = $this->successbooking($user->email, $code, $custom->field_id, $custom->user_id, $response->id);
            $reservation = Reservation::where('code', $code)->get();

            return redirect('paypal/success')->with(['reservation' => $reservation, 'field' => $field, 'user' => $user, 'code' => $code, 'paypal_code' => $response->id]);
        }
        
    }


    public function paypalFailed()
    {
        //Está función será la que se ejecute si se cancela el pago, puedes redirigir a la vista anterior, mostrar un mensaje, etc
    }

    public function paypalSuccess()
    {
        $seo = ['title' => 'Booking Success | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];
        
        return view('frontend/success/fields', ['seo' => $seo]);
    }

    public function successbooking($contact = null, $code = null, $field_id = null, $user_id, $paypal_code = null)
    {

        $correo = new BookingMailable($contact, $code, $field_id, $user_id, $paypal_code);
        Mail::to($contact)->send($correo);
        
    }




}
