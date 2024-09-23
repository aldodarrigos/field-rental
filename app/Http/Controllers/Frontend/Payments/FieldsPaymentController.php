<?php

namespace App\Http\Controllers\Frontend\Payments;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Codeboxr\CouponDiscount\Facades\Coupon;
use Codeboxr\CouponDiscount\Models\CouponHistory;
use DateTime;
use DB;
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
    private $hours;
    private $hot_hours;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');
        $APP_LOCK_BOOKING = env('APP_LOCK_BOOKING', 10);
        $this->hours = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
        $this->hot_hours = ['18:00', '19:00', '20:00', '21:00'];
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],     // ClientID
                $payPalConfig['secret']   // ClientSecret
            )
        );
        $this->apiContext->setConfig($payPalConfig['settings']);

    }

    public function generate_session_fieldsrental(Request $request)
    {
        $request->session()->put('fields_rental', $request->all());
        return response()->json(['success' => true], 200);
    }

    public function get_price_field($date, $field, $hour, $coupon_code = null) // $field = Field::Model()
    {
        $price = 0;
        $priceDiscount = null;
        $price_alt = 0;

        if ((date('N', strtotime($date)) >= 6)) {
            $price = $field->price_weekend;
            $price_alt = $field->price_weekend_alt;
        } else {
            if (in_array($hour, $this->hot_hours)) {
                $price = $field->price_night;
                $price_alt = $field->price_night_alt;
            } else {
                $price = $field->price_regular;
                $price_alt = $field->price_regular_alt;
            }
        }

        if ($coupon_code !== null) {
            $coupon = verify_coupon($coupon_code, $field->id, $date);
            if ($coupon) {
                $hoursCoupon = explode(',', $coupon->hours);
                $discount = $coupon->amount;
                $type = $coupon->type;

                foreach ($hoursCoupon as $key => $item) {
                    if ($item === $hour) {
                        if ($type === 'percentage') {
                            $priceDiscount = $price - ($price * ($discount / 100));
                        } else if ($type === 'fixed') {
                            $priceDiscount = $price - $discount;
                        }
                    }
                }
            }
        }

        return ['price' => $price, 'price_alt' => $price_alt, 'price_dscto' => $priceDiscount];
    }


    public function is_booked($hour, $field, $date)
    {
        $reservations = Reservation::where([
            ['field_id', $field],
            ['res_date', $date]
        ])->get();
        $currentDateTime = new DateTime();
        foreach ($reservations as $item) {
            // Finding hour
            if ($hour == $item->hour) {
                // Someone is paying that hour and needs lock it
                if ($currentDateTime < new DateTime($item->booked_until) && $item->paid == false) {
                    return true;
                }
                // This reservation is done and needs lock it
                else if ($item->paid) {
                    return true;
                }
            }
        }
    }

    public function fieldsrental(Request $request)
    {
        $error = $request->input('error');
        $session_field = session('fields_rental');
        $map = Content::where('id', 11)->first();
        $fields_select = Field::where('status', 1)->orderBy('number', 'ASC')->get();
        $setting = Setting::first();

        $season = $setting->season;
        if ($season == 1) {
            $this->hot_hours = ['20:00', '21:00'];
        }
        $hoursarray = array();
        $players_number = '';
        $field_id = '';
        $date = '';


        if ($request->input('field') || isset($session_field)) {
            $dataFixed = [
                'field_id' => !empty($request->input('field')) ? $request->input('field') : $session_field['fieldIdSelected'],
                'players_number' => !empty($request->input('players_number')) ? $request->input('players_number') : '',
                'date' => !empty($request->input('date')) ? $request->input('date') : $session_field['dateSelected']
            ];

            $field_id = $dataFixed['field_id'];
            $players_number = $dataFixed['field_id'];
            $date = $dataFixed['date'];
            $field = Field::where('id', $field_id)->first();
            $reservations = Reservation::where([
                ['field_id', $field_id],
                ['res_date', $date]
            ])->get();


            foreach ($this->hours as $item) {

                $pricing = $this->get_price_field($date, $field, $item);

                if ($this->is_booked($item, $field->id, $date)) {
                    array_push(
                        $hoursarray,
                        [
                            'hour' => $item,
                            'class' => 'taken',
                            'price' => $pricing['price'],
                            'price_alt' => $pricing['price_alt']
                        ]
                    );
                } else {
                    $classSelected = 'noselect';
                    if (isset($session_field['bookingArray']) && $session_field['bookingArray'] !== '0') {
                        $bookingArray = json_decode($session_field['bookingArray'], true);
                        if (count($bookingArray) > 0) {
                            foreach ($bookingArray as $keySession => $hourSelected) {
                                $hourSelected = $hourSelected[0]; // En el primer elemento se obtiene la hora
                                if ($hourSelected == $item) {
                                    $classSelected = 'selected';
                                }
                            }
                        }

                    }
                    array_push($hoursarray, [
                        'hour' => $item,
                        'class' => $classSelected,
                        'price' => $pricing['price'],
                        'price_alt' => $pricing['price_alt']
                    ]);
                }
            }
            $result = 1;

        } else {
            $field = 0;
            $reservations = 0;
            $date = 0;
            $result = 0;
        }
        $seo = [
            'title' => 'Booking | ' . Setting::first()->site_name,
            'sumary' => 'Book now',
            'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/fieldsrental', ['session_field' => session('fields_rental'), 'seo' => $seo, 'result' => $result, 'field' => $field, 'field_id' => $field_id, 'date' => $date, 'fields_select' => $fields_select, 'reservations' => $reservations, 'hoursarray' => $hoursarray, 'players_number' => $players_number, 'map' => $map, 'setting' => $setting, 'error' => $error]);

    }

    public function payment(Request $request)
    {
        $dateSelected = $request->input('dateSelected');
        $field_id = $request->input('fieldIdSelected');
        $fieldShortName = $request->input('fieldShortName');
        $field_name = $request->input('fieldSelectedName');
        $bookingArray = $request->input('bookingArray');
        $coupon_code = $request->input('coupon_code');
        // $totalPrice = $request->input('totalPrice');
        $totalPrice = 0; // Amount to pay
        $price_regular = 0; // Hours regular price
        $price_dscto = 0; // Hours with discount
        $amountToDiscount = 0; // Amount to apply discount
        $hoursDiscount = 0;
        $userIdLogin = $request->input('userIdLogin');
        $code = str_replace(array('-', ':'), '', $fieldShortName . $dateSelected . rand(1000, 9999));
        $field = Field::where('id', $field_id)->first();

        foreach (json_decode($bookingArray) as $item) {
            // Validate if field is unlocked before continue process
            if ($this->is_booked($item[0], $field->id, $dateSelected)) {
                return redirect()->action([self::class, 'fieldsrental'], ['error' => 'The reservation has been taken; please try another one.']);
            }
            $pricing = $this->get_price_field($dateSelected, $field, $item[0], $coupon_code);

            if ($pricing['price_dscto'] !== null) {
                $totalPrice += $pricing['price_dscto'];
                $price_dscto += $pricing['price_dscto'];
                $amountToDiscount += $pricing['price'];
                $hoursDiscount += 1;
            } else {
                $totalPrice += $pricing['price'];
                $price_regular += $pricing['price'];
            }
        }

        $description = $field_name . ' / ' . $dateSelected;
        // After Step 3
        try {
            $time_lock = env('APP_LOCK_BOOKING');
            $now = Carbon::now(); // Obtiene la hora actual
            $timePlusMinutes = $now->addMinutes((int) $time_lock);
            $reservations_pending = [];
            // Se crea la sesion de pago, aquí podría estar la lógica de bloquear la cancha por un tiempo
            DB::beginTransaction();
            foreach (json_decode($bookingArray) as $item) {
                $pricing = $this->get_price_field($dateSelected, $field, $item[0], $coupon_code);
                $reservation = new Reservation();
                $reservation->user_id = $userIdLogin;
                $reservation->code = $code;
                $reservation->field_id = $field->id;
                $reservation->res_date = $dateSelected;
                $reservation->hour = $item[0];
                $reservation->price = $pricing['price']; // without dscto
                $reservation->final_price = $pricing['price_dscto']; // with dscto
                $reservation->booked_until = $timePlusMinutes;
                $reservation->paid = false;
                if (isset($coupon_code) && $coupon_code !== null && $pricing['price_dscto'] !== null) {
                    $reservation->discount = 1;
                }
                if ($totalPrice <= 0) { // Significa que es un cupon con 100% dscto
                    $reservation->paid = true;
                }
                $reservation->save();
                array_push($reservations_pending, $reservation->id);
            }


            if ($totalPrice <= 0) { // Significa que es un cupon con 100% dscto
                DB::commit();
                return $this->paymentWithDiscount100($coupon_code, $code, $hoursDiscount, $amountToDiscount, $field_id, $userIdLogin);
            }
            // After Step 2
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $amount = new Amount();
            $amount->setTotal($totalPrice);
            // $amount->setTotal(0.01); // TESTING
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
                'amount_discount' => $amountToDiscount,
                'hours_discount' => $hoursDiscount,
                'coupon' => $coupon_code,
                'code' => $code,
                // 'price' => 0.01, // TESTING
                'date' => $dateSelected,
                // 'array' => $bookingArray,
                'pending' => json_encode($reservations_pending)
            ));

            $transaction->setCustom($reservation_data);

            $callbackUrl = url('paypal/status') . "?code=" . $code;
            $failedUrl = url('paypal/failed');
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl($callbackUrl)
                ->setCancelUrl($failedUrl);
            $payment = new Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);
            $payment->create($this->apiContext);

            DB::commit(); // Confirma la transacción si todo salió bien
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            DB::rollBack();
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        } catch (\Exception $ex) {
            DB::rollBack(); // Revertir la transacción si ocurre un error general
            echo $ex->getMessage(); // Mostrar el error para propósitos de depuración
        }

    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');
        $code = $request->input('code');

        if (!$paymentId or !$payerId or !$token or !$code) {
            return redirect('paypal/failed?code=1');
        }


        $now = Carbon::now();
        $reservations = Reservation::where('code', $code)->get();
        if (!$reservations->isEmpty()) {
            foreach ($reservations as $reservation) {
                // Si la reserva ha expirado, cancelarla
                if ($now->greaterThan($reservation->booked_until)) {
                    $reservation->delete(); // Eliminar la reserva si el tiempo expiró
                    return redirect('/paypal/failed?code=2');
                }
            }
        } else {
            return redirect('/paypal/failed?code=1');
        }


        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        //Execute the payment
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $response = json_decode($result);
            $custom = json_decode($response->transactions[0]->custom);
            $coupon = json_decode($custom->coupon);
            $totalPrice = json_decode($custom->price);
            $amount_discount = json_decode($custom->amount_discount);
            $code = json_decode($custom->code);
            $reservations_pending = json_decode($custom->pending);
            // $code = str_replace(array('-', ':'), '', $custom->field_short_name . $custom->date . rand(1000, 9999));

            foreach ($reservations_pending as $item) {
                $reservation = Reservation::where('id', $item)->firstOrFail();
                $reservation->paid = true;
                $reservation->conf_code = $response->id;
                $reservation->save();
            }

            if ($custom->coupon !== null && $amount_discount != 0) {
                $coupon = \App\Models\Coupon::where('code', $custom->coupon)->firstOrFail();
                $discount_amount = 0;

                if ($coupon->type == 'fixed') {
                    $discount_amount += $coupon->amount * $custom->hours_discount;
                } else {
                    $discount_percentage = floatval($coupon->amount);
                    $discount_amount += ($discount_percentage / 100) * floatval($custom->amount_discount);
                }

                $couponHistory = CouponHistory::query()
                    ->create([
                        "user_id" => Auth::user()->id,
                        "coupon_id" => $coupon->id,
                        "order_id" => $custom->code,
                        "object_type" => 'product',
                        "discount_amount" => $discount_amount,
                        "user_ip" => null
                    ]);
                ;
                $coupon->total_use = $coupon->total_use + 1;
                $coupon->save();
            }

            $field = Field::where('id', $custom->field_id)->first();
            $user = User::where('id', $custom->user_id)->first();

            $success = $this->successbooking($user->email, $custom->code, $custom->field_id, $custom->user_id, $response->id, $custom->coupon);
            $reservation = Reservation::where('code', $custom->code)->get();
            return redirect('paypal/success')->with(['coupon' => $custom->coupon, 'reservation' => $reservation, 'field' => $field, 'user' => $user, 'code' => $custom->code, 'paypal_code' => $response->id]);
        }

    }


    public function paymentWithDiscount100($coupon_code, $order_id, $hours_discount, $amount_discount, $field_id, $user_id)
    {
        $coupon = \App\Models\Coupon::where('code', $coupon_code)->firstOrFail();
        $discount_amount = 0;

        if ($coupon->type == 'fixed') {
            $discount_amount += $coupon->amount * $hours_discount;
        } else {
            $discount_percentage = floatval($coupon->amount);
            $discount_amount += ($discount_percentage / 100) * floatval($amount_discount);
        }

        $couponHistory = CouponHistory::query()
            ->create([
                "user_id" => Auth::user()->id,
                "coupon_id" => $coupon->id,
                "order_id" => $order_id,
                "object_type" => 'product',
                "discount_amount" => $discount_amount,
                "user_ip" => null
            ]);
        ;
        $coupon->total_use = $coupon->total_use + 1;
        $coupon->save();

        $field = Field::where('id', $field_id)->first();
        $user = User::where('id', $user_id)->first();

        $success = $this->successbooking($user->email, $order_id, $field_id, $user_id, $order_id, $coupon_code);
        $reservation = Reservation::where('code', $order_id)->get();
        return redirect('paypal/success')->with(['coupon' => $coupon_code, 'reservation' => $reservation, 'field' => $field, 'user' => $user, 'code' => $order_id, 'paypal_code' => $order_id]);
    }

    public function paypalFailed(Request $request)
    {

        $code = $request->input('code');
        $codeList = [
            "1" => 'The payment could not be processed, please make the payment again.<a href="' . url('/') . '">Click here to redirect</a>',
            "2" => 'The payment time was exceeded, please make the payment again. <a href=' . url('/') . '>Click here to redirect</a>',
        ];

        if (array_key_exists($code, $codeList)) {
            echo $codeList[$code];
        } else {
            echo 'Error desconocido.';
        }
    }

    public function paypalSuccess()
    {
        $seo = [
            'title' => 'Booking Success | ' . Setting::first()->site_name,
            'sumary' => '',
            'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/success/fields', ['seo' => $seo]);
    }

    public function successbooking($contact = null, $code = null, $field_id = null, $user_id, $paypal_code = null, $coupon = null)
    {

        $admin_email = Setting::first()->email;

        $confirmation = new BookingMailable($contact, $code, $field_id, $user_id, $paypal_code, $coupon);
        Mail::to($contact)->send($confirmation);

        $copy = new BookingMailable($contact, $code, $field_id, $user_id, $paypal_code, $coupon);
        Mail::to($admin_email)->send($copy);

    }

}
