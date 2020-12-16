<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    public function index()
    {

        //$last_record = Local::latest('id')->first();

        //SEO =======================================
        /*
        $seo = $this->seo->get_seo('COVID-19 seguimiento mundial',
        "https://sarstracker.com/storage/covid-19-wolrd-v2.jpg",
        'Evolución diaria de casos de COVID19 a nivel mundial',
        ""
        );
        */

        return view('frontend/cover', ['seo' => 'xxx']);
        
    }

    public function about()
    {

        return view('frontend/about', ['seo' => 'xxx']);
        
    }

    public function services()
    {

        return view('frontend/services', ['seo' => 'xxx']);
        
    }

    
    public function service($slug = null)
    {

        return view('frontend/service', ['seo' => 'xxx']);
        
    }


    public function fields()
    {

        return view('frontend/fields', ['seo' => 'xxx']);
        
    }

    public function news()
    {

        return view('frontend/news', ['seo' => 'xxx']);
        
    }

    public function post($slug = null)
    {

        return view('frontend/post', ['seo' => 'xxx']);
        
    }

    public function fieldsrental()
    {

        return view('frontend/fieldsrental', ['seo' => 'xxx']);
        
    }

    public function registration()
    {

        return view('frontend/registration', ['seo' => 'xxx']);
        
    }

    public function covid()
    {

        return view('frontend/covid', ['seo' => 'xxx']);
        
    }

    public function contact()
    {

        return view('frontend/contact', ['seo' => 'xxx']);
        
    }

    public function shop()
    {

        return view('frontend/shop', ['seo' => 'xxx']);
        
    }

}
