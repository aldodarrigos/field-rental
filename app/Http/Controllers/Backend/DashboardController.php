<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Codeboxr\CouponDiscount\Facades\Coupon;
use Illuminate\Http\Request;
use App\Models\{Reservation};
use DB;

class DashboardController extends Controller
{

    public function index()
    {

        $reservations = DB::table('reservations')
            ->select(DB::raw('reservations.id, users.name as user_name, users.email as user_email, fields.name as field_name, reservations.hour as hour, reservations.res_date as res_date, reservations.conf_code as res_code'))
            ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
            ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
            ->orderBy('reservations.created_at', 'desc')
            ->get();

        return view('backend/dashboard', ['reservations' => $reservations]);

    }


    public function test()
    {
        // $coupon = Coupon::add([
        //     'coupon_code' => "COP12", // (required) Coupon code
        //     'discount_type' => "percentage", // (required) coupon discount type. two type are accepted (1. percentage and 2. fixed)
        //     'discount_amount' => "20", // (required) discount amount or percentage value
        //     'start_date' => "2024-09-04", // (required) coupon start date
        //     'end_date' => "2024-09-09", // (required) coupon end date
        //     'status' => "1", // (required) two status are accepted. (for active 1 and for inactive 0)
        //     // 'minimum_spend' => "", // (optional) for apply this coupon minimum spend amount. if set empty then it's take unlimited
        //     // 'maximum_spend' => "", // (optional) for apply this coupon maximum spend amount. if set empty then it's take unlimited
        //     // 'use_limit' => "", // (optional) how many times are use this coupon. if set empty then it's take unlimited
        //     // 'use_same_ip_limit' => "1", // (optional) how many times are use this coupon in same ip address. if set empty then it's take unlimited
        //     // 'user_limit' => "", // (optional) how many times are use this coupon a user. if set empty then it's take unlimited
        //     // 'use_device' => "", // (optional) This coupon can be used on any device
        //     // 'multiple_use' => "", // (optional) you can check manually by this multiple coupon code use or not
        //     // 'vendor_id' => ""  // (optional) if coupon code use specific shop or vendor
        // ]);

        // $coupon = Coupon::list()->get();


        // $coupon = Coupon::validity("COP12", 1200, "2354");


        $coupon = Coupon::apply([
            "code" => "HOLA", // coupon code. (required)
            "amount" => "1200", // total amount to apply coupon. must be a numberic number (required)
            "user_id" => "2354", // user id (required)
            "order_id" => "2", // order id (required) => field: code (reservations)
            "device_name" => "", // device name (optional)
            "ip_address" => "", // ip address (optional)
        ]);


        // $coupon = Coupon::history()->get();
        dd([
            "code" => "HOLA", // coupon code. (required)
            "amount" => "1200", // total amount to apply coupon. must be a numberic number (required)
            "user_id" => "2354", // user id (required)
            "order_id" => "2", // order id (required) => field: code (reservations)
            "device_name" => "", // device name (optional)
            "ip_address" => "", // ip address (optional)
        ]);

        // try {

        //     // dd(Auth::user());
        //     $coupon = Coupon::validity("COP12", 1200, "2354");

        //     dd($coupon);

        // } catch (\Throwable $th) {
        //     dd($th->getMessage());
        // }

    }


}
