<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    


    public function login()
    {

        return view('frontend/user-login', ['seo' => 'xxx']);
        
    }

    public function dashboard()
    {

        return view('frontend/profile/dashboard', ['seo' => 'xxx']);
        
    }

    public function singup()
    {

        return view('frontend/singup', ['seo' => 'xxx']);
        
    }

}
