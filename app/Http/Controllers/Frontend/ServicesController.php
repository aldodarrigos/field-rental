<?php

namespace App\Http\Controllers\Frontend;
use App\Models\{Content, Service, Setting, ServiceRegistration, Serviceplayer, Competition, CompetitionStatus, ServiceContact, Summerclinic};
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

        $seo = [
            'title' => 'Services | ' . Setting::first()->site_name,
            'sumary' => '',
            'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/services/services', ['seo' => $seo, 'services' => $services]);

    }


    public function service($slug = null)
    {
        $service = Service::where('slug', $slug)->first();

        $seo = [
            'title' => $service->name . ' | ' . Setting::first()->site_name,
            'sumary' => $service->sumary,
            'image' => $service->img
        ];

        $competitions_on_off = 0;
        $competitions = '';
        $clinics = '';

        if ($slug == 'tournaments') {
            $competitions = Competition::where([['is_league', 0], ['status', '!=', 1]])->orderBy('created_at', 'DESC')->get();
            $competitions_on_off = 1;
        }
        if ($slug == 'leagues') {
            $competitions = Competition::where([['is_league', 1], ['status', '!=', 1]])->orderBy('created_at', 'DESC')->get();
            $competitions_on_off = 1;
        }
        if ($service->id == 5) {
            $clinics = Summerclinic::where('status', '!=', 1)->orderBy('created_at', 'DESC')->get();
        }

        $competition_status = CompetitionStatus::orderBy('id', 'ASC')->get();

        return view('frontend/services/service', ['seo' => $seo, 'service' => $service, 'slug' => $slug, 'competitions' => $competitions, 'competitions_on_off' => $competitions_on_off, 'competition_status' => $competition_status, 'clinics' => $clinics]);

    }


    public function registration($id = null)
    {
        $setting = Setting::first();
        $service = Service::where('id', $id)->first();

        $seo = [
            'title' => $service->name . ' registration | ' . Setting::first()->site_name,
            'sumary' => $service->sumary,
            'image' => $service->img
        ];

        return view('frontend/services/registration', ['seo' => $seo, 'service' => $service, 'setting' => $setting]);

    }

    public function submit(Request $request)
    {
        $price = $request->input('price');
        $price_alt = $request->input('price_alt');

        $acumulative_price = 0;
        $players_count = 0;

        for ($i = 1; $i < 5; $i++) {
            if ($request->input('player_name_' . $i) != null) {

                if ($price_alt > 0) {//if second price is more than 0
                    if ($i == 1) {
                        $acumulative_price += $price;
                    } else {
                        $acumulative_price += $price_alt;
                    }
                } else {//if second price is 0

                    $players_count++;

                }
            }
        }
        // Set default price
        if ($price_alt > 0) {
            $final_price = $acumulative_price;
        } else {
            $final_price = $players_count * $price;
        }

        $registration = new ServiceRegistration();

        $registration->service_id = $request->input('service_id');
        $registration->responsible_user = $request->input('user_id');
        $registration->address = $request->input('address');
        $registration->city = $request->input('city');
        $registration->zip = $request->input('zip');
        $registration->phone_home = $request->input('phone_home');
        $registration->phone_cell = $request->input('phone_cell');
        $registration->emergency_contact = $request->input('emergency_contact');
        $registration->emergency_phone = $request->input('emergency_phone');
        $registration->price = $final_price;
        $registration->save();

        for ($i = 1; $i < 5; $i++) {

            $grade = ($request->input('grade_' . $i) != null) ? $request->input('grade_' . $i) : null;

            if ($request->input('player_name_' . $i) != null) {
                $newPlayer = new Serviceplayer();
                $newPlayer->registration_id = $registration->id;
                $newPlayer->name = $request->input('player_name_' . $i);
                $newPlayer->age = $request->input('age_' . $i);
                $newPlayer->gender = $request->input('gender_' . $i);
                $newPlayer->tshirt_size = $request->input('tshirt_' . $i);
                $newPlayer->grade = $grade;
                $newPlayer->obs = $request->input('obs_' . $i);
                $newPlayer->save();
            }

        }

        return redirect('service/confirmation/' . $registration->id)->with('success', 'Successful register!');
    }



    public function confirmation($id = null)
    {
        $setting = Setting::first();

        $registration = DB::table('service_registration')
            ->select(DB::raw('service_registration.id as registration_id, 

        service_registration.service_id as service_id,
        services.name as service_name,

        service_registration.responsible_user as user_id, 
        service_registration.address, 
        service_registration.city, 
        service_registration.zip, 
        service_registration.phone_home, 
        service_registration.phone_cell,
        service_registration.emergency_contact,
        service_registration.emergency_phone,
        service_registration.price as final_price,
        service_registration.payment_code,
        service_registration.status as registration_status,
        service_registration.updated_at as registration_updated_at,

        users.name as user_name, users.email as user_email, users.phone as user_phone'))

            ->leftJoin('users', 'service_registration.responsible_user', '=', 'users.id')
            ->leftJoin('services', 'service_registration.service_id', '=', 'services.id')
            ->where('service_registration.id', $id)
            ->first();


        $service = Service::where('id', $registration->service_id)->first();
        $players = Serviceplayer::where('registration_id', $registration->registration_id)->get();

        $seo = [
            'title' => $service->name . ' registration | ' . Setting::first()->site_name,
            'sumary' => $service->sumary,
            'image' => $service->img
        ];

        return view('frontend/services/confirmation', ['seo' => $seo, 'registration' => $registration, 'service' => $service, 'players' => $players, 'setting' => $setting]);

    }

    public function contact(Request $request)
    {
        if ($request->input()) {

            $validator = $request->validate([
                'f_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
                'captcha' => 'required|captcha',
            ]);

            $contact = new ServiceContact();

            $service_id = $request->input('service_id');

            $service = Service::where('id', $service_id)->first();

            $contact->service_id = $service_id;
            $contact->name = $request->input('f_name');
            $contact->email = $request->input('email');
            $contact->phone = $request->input('phone');
            $contact->message = $request->input('message');
            $contact->save();

            return redirect('services/' . $service->slug)->with('success', 'Message sent!');

        }



    }
}
