<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CouponField;
use App\Models\CouponHistory;
use App\Models\CouponReservationDate;
use Auth;
use Carbon\Carbon;
use Codeboxr\CouponDiscount\Facades\Coupon;
use Illuminate\Http\Request;
use App\Models\{Reservation, Field, Setting};
use DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class CouponsController extends Controller
{

    private $hot_hours;
    private $hours;
    public function __construct()
    {
        $APP_LOCK_BOOKING = env('APP_LOCK_BOOKING', 10);
        $this->hours = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
        $this->hot_hours = ['18:00', '19:00', '20:00', '21:00'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function validateCoupon($code, $field_id, $date)
    {
        $url = "coupons";
        $response = [
            'success' => false,
            'message' => 'The coupon is invalid',
            'hours' => null
        ];

        if (!$field_id || !$date || !$code) {
            return response()->json($response);
        }
        $coupon = verify_coupon($code, $field_id, $date);
        if ($coupon !== null) {
            $response['hours'] = explode(',', $coupon->hours);
            $response['amount'] = $coupon->amount;
            $response['type'] = $coupon->type;
            $response['message'] = 'The coupon is valid!';
            $response['success'] = true;
        }
        return response()->json($response);
    }

    public function index(Request $request)
    {
        $url = "coupons";
        $coupons = \Codeboxr\CouponDiscount\Models\Coupon::orderBy('id', 'desc')->get();

        foreach ($coupons as $key => $coupon) {
            $coupon->end_date = Carbon::parse($coupon->end_date)->subDay()->format('Y-m-d');
        }

        return view('backend/coupons/index', ['coupons' => $coupons, 'url' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $fields = Field::where('status', 1)->orderBy('number', 'ASC')->get();
        $action = route('coupons.store');
        $url = "coupons";
        $setting = Setting::first();
        $fields = Field::where('status', 1)->orderBy('number')->get();
        $hours = ['8:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];

        return view('backend/coupons/create', ['url' => $url, 'action' => $action, 'fields' => $fields, 'hours' => $hours]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->fields;
        $hours = $request->hours;
        $type_date = $request->type_date;
        $amount = str_replace(['$', '%'], '', $request->input('amount'));
        $reservation_dates = explode(',', $request->reservation_dates);
        // That's range date means
        if ($type_date == 'on') {
            $reservation_dates = range_dates_to_array($reservation_dates[0]);
        }

        $response = [
            'alert' => 'danger',
            'message' => 'The registration was not successful',
        ];
        // return redirect('booking/' . $id . '/edit')->with('response', $response);

        Coupon::add([
            'coupon_code' => $request->code, // (required) Coupon code
            'discount_type' => $request->type, // (required) coupon discount type. two type are accepted (1. percentage and 2. fixed)
            'discount_amount' => $amount, // (required) discount amount or percentage value
            'start_date' => $request->start_date, // (required) coupon start date
            'end_date' => Carbon::parse($request->end_date)->addDay(), // (required) coupon end date
            'status' => "1", // (required) two status are accepted. (for active 1 and for inactive 0)
            // 'minimum_spend' => "", // (optional) for apply this coupon minimum spend amount. if set empty then it's take unlimited
            // 'maximum_spend' => "", // (optional) for apply this coupon maximum spend amount. if set empty then it's take unlimited
            'use_limit' => (int) $request->use_limit, // (optional) how many times are use this coupon. if set empty then it's take unlimited
            // 'use_same_ip_limit' => "1", // (optional) how many times are use this coupon in same ip address. if set empty then it's take unlimited
            // 'user_limit' => "", // (optional) how many times are use this coupon a user. if set empty then it's take unlimited
            // 'use_device' => "", // (optional) This coupon can be used on any device
            // 'multiple_use' => "", // (optional) you can check manually by this multiple coupon code use or not
            // 'vendor_id' => ""  // (optional) if coupon code use specific shop or vendor
        ]);
        $coupon = \Codeboxr\CouponDiscount\Models\Coupon::where('code', $request->code)->first();
        $coupon->hours = implode(',', $hours);
        // That's range date means
        if ($type_date == 'on') {
            $coupon->range_dates_reservation = $request->reservation_dates;
        }
        $coupon->save();
        foreach ($fields as $key => $field) {
            $coupon_field = new CouponField;
            $coupon_field->coupon_id = $coupon->id;
            $coupon_field->field_id = $field;
            $coupon_field->save();
        }

        foreach ($reservation_dates as $key => $date) {
            $reservation_date = new CouponReservationDate;
            $reservation_date->coupon_id = $coupon->id;
            $reservation_date->date = $date;
            $reservation_date->save();
        }
        return redirect('coupons');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = route('coupons.update', $id);
        $url = "coupons";
        $coupon = \App\Models\Coupon::where('id', $id)->first();
        $coupon->end_date = Carbon::parse($coupon->end_date)->subDay()->format('Y-m-d'); // (required) coupon end date
        $coupon->hours = collect(explode(',', $coupon->hours));
        $dates = $coupon->reservation_dates()->pluck('date');
        $coupon->reservation_dates = $dates->implode(',');

        // dd($coupon->range_dates_reservation);
        $fields = Field::where('status', 1)->get();
        $hours = ['8:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
        // dd($coupon->fields->contains('id', 1));
        return view('backend/coupons/update')->with(compact('action', 'coupon', 'url', 'hours', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $code = $request->input('code');
        $type = $request->input('type');
        $type_date = $request->input('type_date');
        $amount = str_replace(['$', '%'], '', $request->input('amount'));
        $use_limit = $request->input('use_limit');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');
        $fields = $request->fields;
        $hours = $request->hours;
        $reservation_dates = explode(',', $request->reservation_dates);

        // dd($amount);

        if ($type_date == 'on') {
            $reservation_dates = range_dates_to_array($reservation_dates[0]);
        }

        // dd($start_date);
        // dd($end_date);
        $user = Auth::user();
        $response = [
            'alert' => 'danger',
            'message' => 'The registration was not successful',
        ];
        $coupon = \App\Models\Coupon::where('id', $id)->first();
        if ($coupon) {
            Coupon::update([
                'coupon_code' => $code, // (required) Coupon code
                'discount_type' => $type, // (required) coupon discount type. two type are accepted (1. percentage and 2. fixed)
                'discount_amount' => $amount, // (required) discount amount or percentage value
                'start_date' => $start_date, // (required) coupon start date
                'end_date' => Carbon::parse($request->end_date)->addDay(), // (required) coupon end date
                'status' => $status, // (required) two status are accepted. (for active 1 and for inactive 0)
                // 'minimum_spend' => "", // (optional) for apply this coupon minimum spend amount. if set empty then it's take unlimited
                // 'maximum_spend' => "", // (optional) for apply this coupon maximum spend amount. if set empty then it's take unlimited
                'use_limit' => (int) $use_limit, // (optional) how many times are use this coupon. if set empty then it's take unlimited
                // 'use_same_ip_limit' => "", // (optional) how many times are use this coupon in same ip address. if set empty then it's take unlimited
                // 'user_limit' => "", // (optional) how many times are use this coupon a user. if set empty then it's take unlimited
                // 'use_device' => "", // (optional) This coupon can be used on any device
                // 'multiple_use' => "", // (optional) you can check manually by this multiple coupon code use or not
                // 'vendor_id' => "" // (optional) if coupon code use specific shop or vendor
            ], $id);
            $coupon->reservation_dates()->delete();
            $coupon->fields()->delete();
            $coupon->hours = implode(',', $hours);
            // That's range date means
            if ($type_date == 'on') {
                $coupon->range_dates_reservation = $request->reservation_dates;
            } else {
                $coupon->range_dates_reservation = null;
            }
            $coupon->save();


            foreach ($fields as $key => $field) {
                $coupon_field = new CouponField;
                $coupon_field->coupon_id = $coupon->id;
                $coupon_field->field_id = $field;
                $coupon_field->save();
            }

            foreach ($reservation_dates as $key => $date) {
                $reservation_date = new CouponReservationDate;
                $reservation_date->coupon_id = $coupon->id;
                $reservation_date->date = $date;
                $reservation_date->save();
            }
            $response = [
                'alert' => 'success',
                'message' => 'The coupon was updated',
            ];
            return redirect('coupons');
        }
        return redirect('coupons/' . $id . '/edit')->with('response', $response);
    }

    public function show($id)
    {

        $reservation = DB::table('reservations')
            ->select(DB::raw('reservations.id, reservations.code, reservations.code, users.name as user_name, users.email as user_email, fields.name as field_name, reservations.hour as hour, reservations.res_date as res_date, reservations.price as price, reservations.conf_code as res_code, reservations.created_at as created_at, reservations.note, reservations.user_rel'))
            ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
            ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
            ->where('reservations.id', $id)
            ->orderBy('reservations.created_at', 'desc')
            ->first();

        $url = "reservations";

        return view('backend/reservations/show', ['reservation' => $reservation, 'url' => $url]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Reservation::find($id);
        $record->delete();

        return redirect('booking')->with('success', 'Reservation deleted.');
    }


    public function get_history($id)
    {

        $histories = CouponHistory::where('coupon_id', $id)->get();
        // $action = route('coupons.history', $id);
        $url = "coupons";
        return view('backend/coupons/history')->with(compact('histories', 'url'));
    }

}
