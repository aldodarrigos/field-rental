<?php

namespace App\Http\Controllers\Frontend;
use App\Models\{ Summerclinic, Setting, Summerclinicreg, Summerclinicplay };
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Str;

class SoccerClinicController extends Controller
{
    
    public function event($slug = null)
    {

        $event = Summerclinic::where('slug', $slug)->first();
        $title = 'Soccer Clinic';
        $setting = Setting::first();

        $seo = ['title' => $event->name.' | KISC, Sports complex', 
        'sumary' => $event->sumary, 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        
        return view('frontend/soccer_clinic/event', ['seo' => $seo, 'event' => $event, 'title' => $title, 'setting' => $setting]);
        
    }
    
            
    public function registration(Request $request)
    {

        $event_id = $request->input('event_id');
        $user_id = $request->input('user_id');
        $event_price = $request->input('event_price');
        $event_price_alt = $request->input('event_price_alt');
        

        $acumulative_price = 0;
        $players_count = 0;

        for ($i=1; $i < 11; $i++) { 
            if($request->input('player_name_'.$i) != null){

                if($event_price_alt > 0){//if second price is more than 0
                    if($i == 1){
                        $acumulative_price += $event_price;
                    }else{
                        $acumulative_price += $event_price_alt;
                    }
                }else{//if second price is 0

                    $players_count++;

                }
            }
        }
        // Set default price
        if($event_price_alt > 0){
            $final_price = $acumulative_price;
        }else{
            $final_price = $players_count * $event_price;
        }

        $summerclinicreg = new Summerclinicreg();
        $summerclinicreg->event_id = $event_id;
        $summerclinicreg->user_id = $user_id;
        $summerclinicreg->price = $final_price;
        $summerclinicreg->status = 0;
        $summerclinicreg->save();


        
        for ($i=1; $i < 6; $i++) { 

            if($request->input('player_name_'.$i) != null){
                $newPlayer = new Summerclinicplay();
                $newPlayer->registration_id = $summerclinicreg->id;
                $newPlayer->name = $request->input('player_name_'.$i);
                $newPlayer->age = $request->input('age_'.$i);
                $newPlayer->gender = $request->input('gender_'.$i);
                $newPlayer->tshirt_size = $request->input('tshirt_'.$i);
                $newPlayer->obs = $request->input('obs_'.$i);
                $newPlayer->save();
            }

        }


        return redirect('soccer-clinic-confirmation/'.$summerclinicreg->id)->with('success', 'Registration success!');
        
    }


                
    public function confirmation($id = null)
    {

        $registration = DB::table('summerclinic_registration')
        ->select(DB::raw('summerclinic_registration.id as registration_id, 

        summerclinic.id as event_id,
        summerclinic.name as event_name,
        summerclinic.sumary as event_sumary,
        summerclinic.img as event_img,
        summerclinic.status as event_status,

        summerclinic_registration.user_id, 
        summerclinic_registration.price as final_price,
        summerclinic_registration.payment_code,
        summerclinic_registration.status as registration_status,
        summerclinic_registration.updated_at as registration_updated_at,

        users.name as user_name, users.email as user_email, users.phone as user_phone'))

        ->leftJoin('users', 'summerclinic_registration.user_id', '=', 'users.id')
        ->leftJoin('summerclinic', 'summerclinic_registration.event_id', '=', 'summerclinic.id')
        ->where('summerclinic_registration.id', $id)
        ->first();

        $players = Summerclinicplay::where('registration_id', $registration->registration_id)->get();

        $seo = ['title' => $registration->event_name.' Registration | KISC, Sports complex', 
        'sumary' => $registration->event_sumary, 
        'image' => $registration->event_img
        ];
        
        return view('frontend/soccer_clinic/confirmation', ['registration' => $registration, 'players' => $players, 'seo' => $seo]);
        
    }
    



}
