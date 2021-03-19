<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Reservation, User, Service};
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
                return redirect('/booking');
            }else{
                return redirect('/');
            }

        }
        // if failed login
        return redirect('signin')->with('status', 'Incorrect email or password.');
        
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

        $orders = DB::table('sales')
        ->select(DB::raw('sales.id, products.name as product_name, users.email as user_email, sales.size as product_size, sales.quantity as quantity, sales.code as code, sales.created_at as date'))
        ->leftJoin('users', 'sales.user_id', '=', 'users.id')
        ->leftJoin('products', 'sales.product_id', '=', 'products.id')
        ->where('sales.user_id', Auth::user()->id)
        ->orderBy('sales.created_at', 'desc')
        ->get();

        $services = DB::table('service_registration')
        ->select(DB::raw('service_registration.id as registration_id, services.name as service_name, services.price as service_price, service_registration.player_name as player_name, service_registration.status as registration_status, service_registration.payment_code as payment_code, service_registration.updated_at as registration_date'))

        ->leftJoin('users', 'service_registration.responsible_user', '=', 'users.id')
        ->leftJoin('services', 'service_registration.service_id', '=', 'services.id')
        ->where('service_registration.responsible_user', Auth::user()->id)
        ->orderBy('service_registration.created_at', 'desc')
        ->get();

        $tournaments = DB::table('crews')
        ->select(DB::raw('crews.id team_id, 
        crews.name as team_name, 
        categories.name as category,
        competitions.name as competition_name,

        users.name as registrant,
        competition_crews.id as registration_id,
        competition_crews.updated_at as registration_date,
        competition_crews.status as registration_status'))

        ->leftJoin('categories', 'crews.category_id', '=', 'categories.id')
        ->leftJoin('competition_crews', 'crews.id', '=', 'competition_crews.crew_id')
        ->leftJoin('competitions', 'competition_crews.competition_id', '=', 'competitions.id')
        ->leftJoin('users', 'competition_crews.user_id', '=', 'users.id')

        ->where('crews.manager_id', Auth::user()->id)
        ->orderBy('crews.updated_at', 'desc')
        ->get();


        $leagues = DB::table('trials')
        ->select(DB::raw('trials.id trial_id, 
        trials.name as player_name, 
        trials.age as player_age, 
        trials.gender as player_gender,
        trials.tshirt as player_tshirt,

        categories.name as category,

        competitions.name as competition_name,

        users.name as registrant,

        competition_trials.id as registration_id,
        competition_trials.status as registration_status,
        competition_trials.updated_at as registration_date'))

        ->leftJoin('categories', 'trials.category_id', '=', 'categories.id')
        ->leftJoin('competition_trials', 'trials.registration_id', '=', 'competition_trials.id')
        ->leftJoin('competitions', 'competition_trials.competition_id', '=', 'competitions.id')
        ->leftJoin('users', 'competition_trials.manager_id', '=', 'users.id')
        ->where('competition_trials.manager_id', Auth::user()->id)
        ->orderBy('trials.updated_at', 'desc')
        ->get();

        $user = User::where('id', Auth::user()->id)->first();

        $seo = ['title' => 'User Dashboard | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/profile/dashboard', ['seo' => $seo, 'reservations' => $reservations, 'orders' => $orders, 'user' => $user, 'services' => $services, 'tournaments' => $tournaments, 'leagues' => $leagues]);
        
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
