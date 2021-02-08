<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Reservation, User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    


    public function login()
    {
        $seo = ['title' => 'Sign In | KISC, Sports complex', 
            'sumary' => '', 
            'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
            ];
        return view('frontend/user-login', ['seo' => $seo]);
        
    }

    public function authenticate(Request $request)
    {

        // Retrive Input
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == 1) {
                return redirect('/');
            } else if(Auth::user()->role == 2){
                return redirect('/backend-booking');
            }else{
                return redirect('/');
            }

        }
        // if failed login
        return redirect('user-login');
        
    }

    public function dashboard()
    {
        
        $reservations = DB::table('reservations')
        ->select(DB::raw('reservations.id, users.name as user_name, users.email as user_email, fields.name as field_name, reservations.hour as hour, reservations.res_date as res_date'))
        ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
        ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
        ->where('reservations.user_id', Auth::user()->id)
        ->orderBy('reservations.created_at', 'desc')
        ->get();

        $user = User::where('id', Auth::user()->id)->first();

        return view('frontend/profile/dashboard', ['reservations' => $reservations, 'user' => $user]);
        
    }

    public function singup()
    {
        $seo = ['title' => 'Sign Up | KISC, Sports complex', 
            'sumary' => '', 
            'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
            ];
        return view('frontend/singup', ['seo' => $seo]);
        
    }

}
