<?php

namespace App\Http\Controllers\Frontend;
use App\Models\{Content, Service, Setting, Tag, Product};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CaptchaController extends Controller
{
    public function reload()
    {
        return  response()->json(['captcha' => captcha_img()]);
    }

}
