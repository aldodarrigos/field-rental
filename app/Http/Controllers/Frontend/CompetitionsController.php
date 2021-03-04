<?php

namespace App\Http\Controllers\Frontend;
use App\Models\{ Competition, Crew, Trial, CrewPlayer, CompetitionCrew, CompetitionRegistration, CompetitionTrial, Setting, CompetitionContact, CompetitionStatus};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Str;

class CompetitionsController extends Controller
{
    
    public function tournaments()
    {

        $posts = Competition::where([['is_league', 0], ['status', '!=', 1]])->get();
        $setting = Setting::first();
        $title = 'Tournaments';

        $seo = ['title' => 'Tournaments | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        $competition_status = CompetitionStatus::orderBy('id', 'ASC')->get();
        
        return view('frontend/competitions/index', ['seo' => $seo, 'posts' => $posts, 'setting' => $setting, 'title' => $title, 'competition_status' => $competition_status]);
        
    }
    
    public function leagues()
    {

        $posts = Competition::where([['is_league', 1], ['status', '!=', 1]])->get();
        $setting = Setting::first();
        $title = 'Leagues';

        $seo = ['title' => 'Leagues | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        $competition_status = CompetitionStatus::orderBy('id', 'ASC')->get();
        
        return view('frontend/competitions/index', ['seo' => $seo, 'posts' => $posts, 'setting' => $setting, 'title' => $title, 'competition_status' => $competition_status]);
        
    }
    
    public function competition($slug)
    {

        $competition = Competition::where('slug', $slug)->first();
        $setting = Setting::first();

        $seo = ['title' => $competition->name.' | KISC, Sports complex', 
        'sumary' => $competition->sumary, 
        'image' => $competition->img
        ];
        
        return view('frontend/competitions/competition', ['seo' => $seo, 'competition' => $competition, 'setting' => $setting]);
        
    }
    
    public function registration($id = null)
    {

        $competition = Competition::where('id', $id)->first();
        //$categories = Category::where('status', 1)->orderBy('id', 'ASC')->get();

        $categories = DB::table('competition_categories')
        ->select(DB::raw('competition_categories.id, competition_categories.category_id, categories.name'))
        ->leftJoin('categories', 'competition_categories.category_id', '=', 'categories.id')
        ->where('competition_categories.competition_id', $id)
        ->orderBy('categories.sort', 'asc')
        ->get();

        $setting = Setting::first();

        $seo = ['title' => $competition->name.' Registration | KISC, Sports complex', 
        'sumary' => $competition->sumary, 
        'image' => $competition->img
        ];

        return view('frontend/competitions/registration', ['seo' => $seo, 'competition' => $competition, 'setting' => $setting, 'categories' => $categories]);
        
    }
        
    public function submit(Request $request)
    {

        $id = $request->input('competition_id');

        $registration = new CompetitionRegistration();
        
        $registration->competition_id = $request->input('competition_id');
        $registration->fullname = $request->input('fullname');
        $registration->email = $request->input('email');
        $registration->phone = $request->input('phone');

        $registration->category_id = $request->input('category');
        $registration->team = $request->input('team');
        $registration->gender = $request->input('gender');
        $registration->number_players = $request->input('number_players');
        $registration->message = $request->input('message');
        $registration->save();

        return redirect('registration/'.$id.'/xxxx')->with('success', 'Message sent!');
        
    }
        
    public function contact(Request $request)
    {

        $slug = $request->input('slug');
        $is_league = $request->input('is_league');
        $uri = ($is_league == 1)?'leagues':'tournaments';

        $contact = new CompetitionContact();
        
        $contact->competition_id = $request->input('competition_id');
        $contact->name = $request->input('f_name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->message = $request->input('message');
        $contact->save();

        return redirect($uri.'/'.$slug)->with('success', 'Message sent!');
        
    }


    public function team_registration($id = null)
    {

        $competition = Competition::where('id', $id)->first();


        $categories = DB::table('competition_categories')
        ->select(DB::raw('competition_categories.id, competition_categories.category_id, categories.name'))
        ->leftJoin('categories', 'competition_categories.category_id', '=', 'categories.id')
        ->where('competition_categories.competition_id', $id)
        ->orderBy('categories.sort', 'asc')
        ->get();

        $setting = Setting::first();

        $seo = ['title' => $competition->name.' Registration | KISC, Sports complex', 
        'sumary' => $competition->sumary, 
        'image' => $competition->img
        ];

        return view('frontend/competitions/team_registration', ['seo' => $seo, 'competition' => $competition, 'setting' => $setting, 'categories' => $categories]);
        
    }

            
    public function team_submit(Request $request)
    {

        $competition_id = $request->input('competition_id');
        $competition_price = $request->input('competition_price');
        $user_id = $request->input('user_id');
        $team_name = $request->input('team_name');
        $slug = Str::of($team_name)->slug('-');
        $uniform = $request->input('uniform');
        $gender = $request->input('gender');
        $category_competition = $request->input('category');

        $crew = new Crew();
        $crew->manager_id = $user_id;
        $crew->name = $team_name;
        $crew->slug = $slug;
        $crew->uniform_colors = $uniform;
        $crew->gender = $gender;
        $crew->category_id = $category_competition;
        $crew->save();

        $competitionCrew = new CompetitionCrew();
        $competitionCrew->competition_id = $competition_id;
        $competitionCrew->user_id = $user_id;
        $competitionCrew->crew_id = $crew->id;
        $competitionCrew->price = $competition_price;
        $competitionCrew->status = 0;
        $competitionCrew->save();
        
        for ($i=1; $i < 11; $i++) { 

            if($request->input('player_name_'.$i) != null){
                $crewPlayer = new CrewPlayer();
                $crewPlayer->crew_id = $crew->id;
                $crewPlayer->name = $request->input('player_name_'.$i);
                $crewPlayer->age = $request->input('age_'.$i);
                $crewPlayer->save();
            }

        }

        return redirect('team-confirmation/'.$competitionCrew->id)->with('success', 'Registration success!');
        
    }

            
    public function team_confirmation($id = null)
    {

        $registration = DB::table('competition_crews')
        ->select(DB::raw('competition_crews.id as registration_id, 
        competition_crews.competition_id as competition_id, 
        competition_crews.price as registration_price, 
        competition_crews.status as registration_status, 

        users.name as user_name, users.email as user_email, users.phone as user_phone,
        crews.id as team_id, crews.name as team_name, crews.manager_id as manager, 
        crews.uniform_colors as uniforms, crews.gender as gender,
        categories.name as category'))

        ->leftJoin('users', 'competition_crews.user_id', '=', 'users.id')
        ->leftJoin('crews', 'competition_crews.crew_id', '=', 'crews.id')
        ->leftJoin('categories', 'crews.category_id', '=', 'categories.id')
        ->where('competition_crews.id', $id)
        ->first();

        $team = CrewPlayer::where('crew_id', $registration->team_id)->orderBy('name', 'ASC')->get();
        $competition = Competition::where('id', $registration->competition_id)->first();

        $seo = ['title' => $competition->name.' Registration | KISC, Sports complex', 
        'sumary' => $competition->sumary, 
        'image' => $competition->img
        ];
        
        return view('frontend/competitions/team_confirmation', ['registration' => $registration, 'team' => $team, 'competition' => $competition, 'seo' => $seo]);
        
    }



    public function trials_registration($id = null)
    {

        $competition = Competition::where('id', $id)->first();


        $categories = DB::table('competition_categories')
        ->select(DB::raw('competition_categories.id, competition_categories.category_id, categories.name'))
        ->leftJoin('categories', 'competition_categories.category_id', '=', 'categories.id')
        ->where('competition_categories.competition_id', $id)
        ->orderBy('categories.sort', 'asc')
        ->get();

        $setting = Setting::first();

        $seo = ['title' => $competition->name.' Registration | KISC, Sports complex', 
        'sumary' => $competition->sumary, 
        'image' => $competition->img
        ];

        return view('frontend/competitions/trials_registration', ['seo' => $seo, 'competition' => $competition, 'setting' => $setting, 'categories' => $categories]);
        
    }

            
    public function trials_submit(Request $request)
    {

        $competition_id = $request->input('competition_id');
        $competition_price = $request->input('competition_price');
        $competition_second_price = $request->input('competition_second_price');
        $user_id = $request->input('user_id');

        $discount_price = 0;
        $players_count = 0;

        for ($i=1; $i < 11; $i++) { 
            if($request->input('player_name_'.$i) != null){

                if($competition_second_price > 0){
                    if($i == 1){
                        $discount_price += $competition_price;
                    }else{
                        $discount_price += $competition_second_price;
                    }
                }else{

                    $players_count++;

                }
            }
        }

        if($competition_second_price > 0){
            $final_price = $discount_price;
        }else{
            $final_price = $players_count * $competition_price;
        }


        $competitionTrial = new CompetitionTrial();
        $competitionTrial->competition_id = $competition_id;
        $competitionTrial->manager_id = $user_id;
        $competitionTrial->price = $final_price;
        $competitionTrial->status = 0;
        $competitionTrial->save();
        
        for ($i=1; $i < 11; $i++) { 

            if($request->input('player_name_'.$i) != null){
                $newPlayer = new Trial();
                $newPlayer->competition_id = $competition_id;
                $newPlayer->registration_id = $competitionTrial->id;
                $newPlayer->name = $request->input('player_name_'.$i);
                $newPlayer->age = $request->input('age_'.$i);
                $newPlayer->gender = $request->input('gender_'.$i);
                $newPlayer->category_id = $request->input('category_'.$i);
                $newPlayer->save();
            }

        }

        return redirect('trials-confirmation/'.$competitionTrial->id)->with('success', 'Registration success!');
        
    }

            
    public function trials_confirmation($id = null)
    {

        $registration = DB::table('competition_trials')
        ->select(DB::raw('competition_trials.id as registration_id, 
        competition_trials.competition_id as competition_id, 
        competition_trials.price as registration_price, 
        competition_trials.status as registration_status, 
        competition_trials.manager_id as manager_id, 

        users.name as user_name, users.email as user_email, users.phone as user_phone'))

        ->leftJoin('users', 'competition_trials.manager_id', '=', 'users.id')
        ->where('competition_trials.id', $id)
        ->first();

        $trials = DB::table('trials')
        ->select(DB::raw('trials.id as registration_id, 
        trials.competition_id as competition_id, 
        trials.name, 
        trials.age, 
        trials.gender, 
        categories.name as category'))

        ->leftJoin('categories', 'trials.category_id', '=', 'categories.id')
        ->where('trials.registration_id', $registration->registration_id)
        ->get();

        $competition = Competition::where('id', $registration->competition_id)->first();

        $seo = ['title' => $competition->name.' Registration | KISC, Sports complex', 
        'sumary' => $competition->sumary, 
        'image' => $competition->img
        ];
        
        return view('frontend/competitions/trials_confirmation', ['registration' => $registration, 'trials' => $trials, 'competition' => $competition, 'seo' => $seo]);
        
    }



}
