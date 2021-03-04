<?php

namespace App\Http\Controllers\Frontend;
use App\Models\{Content, Service, Setting, ServiceRegistration, Competition, CompetitionStatus};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use DB;

class ServicesController extends Controller
{

    public function services()
    {
        $services = Service::where('status', 1)->orderBy('sort', 'ASC')->get();

        $seo = ['title' => 'Services | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/services/services', ['seo' => $seo, 'services' => $services]);
        
    }

    
    public function service($slug = null)
    {
        $service = Service::where('slug', $slug)->first();

        $seo = ['title' => $service->name.' | KISC, Sports complex', 
        'sumary' => $service->sumary, 
        'image' => $service->img
        ];

        $competitions_on_off = 0;
        $competitions = '';

        if($slug == 'tournaments'){
            $competitions = Competition::where([['is_league', 0], ['status', '!=', 1]])->get();
            $competitions_on_off = 1;
        }
        if($slug == 'leagues'){
            $competitions = Competition::where([['is_league', 1], ['status','!=', 1]])->get();
            $competitions_on_off = 1;
        }

        $competition_status = CompetitionStatus::orderBy('id', 'ASC')->get();

        return view('frontend/services/service', ['seo' => $seo, 'service' => $service, 'slug' => $slug, 'competitions' => $competitions, 'competitions_on_off' => $competitions_on_off, 'competition_status' => $competition_status]);
        
    }

    
    public function registration($id = null)
    {
        $setting = Setting::first();
        $service = Service::where('id', $id)->first();

        $seo = ['title' => $service->name.' registration | KISC, Sports complex', 
        'sumary' => $service->sumary, 
        'image' => $service->img
        ];

        return view('frontend/services/registration', ['seo' => $seo, 'service' => $service, 'setting' => $setting]);
        
    }

    public function submit(Request $request)
    {
        $registration = new ServiceRegistration();

        $registration->service_id = $request->input('service_id');
        $registration->responsible_user = $request->input('user_id');
        $registration->player_name = $request->input('player_name');
        $registration->dob = $request->input('dob');
        $registration->gender = $request->input('gender');
        $registration->address = $request->input('address');
        $registration->city = $request->input('city');
        $registration->zip = $request->input('zip');
        $registration->email = $request->input('email');
        $registration->phone_home = $request->input('phone_home');
        $registration->phone_cell = $request->input('phone_cell');
        $registration->grade = $request->input('grade');
        $registration->tshirt_size = $request->input('tshirt_size');
        $registration->emergency_contact = $request->input('emergency_contact');
        $registration->emergency_phone = $request->input('emergency_phone');
        $registration->obs = $request->input('obs');

        $registration->save();

        return redirect('service/registration-confirmation/'.$registration->id)->with('success', 'Successful register!');
    }


        
    public function confirmation($id = null)
    {
        $setting = Setting::first();
        $registration = ServiceRegistration::where('id', $id)->first();
        $service = Service::where('id', $registration->service_id)->first();

        $seo = ['title' => $service->name.' registration | KISC, Sports complex', 
        'sumary' => $service->sumary, 
        'image' => $service->img
        ];

        return view('frontend/services/confirmation', ['seo' => $seo, 'registration' => $registration, 'service' => $service, 'setting' => $setting]);
        
    }
}
