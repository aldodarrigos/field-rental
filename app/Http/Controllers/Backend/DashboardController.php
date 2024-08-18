<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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


}
