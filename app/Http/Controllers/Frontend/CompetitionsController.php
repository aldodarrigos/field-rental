<?php

namespace App\Http\Controllers\Frontend;
use App\Models\{ Competition, Category, CompetitionRegistration, Setting, CompetitionContact};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use DB;

class CompetitionsController extends Controller
{
    
    public function tournaments()
    {

        $posts = Competition::where([['is_league', 0], ['status', 1]])->get();
        $setting = Setting::first();
        $title = 'Tournaments';

        $seo = ['title' => 'Tournaments | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];
        
        return view('frontend/competitions/index', ['seo' => $seo, 'posts' => $posts, 'setting' => $setting, 'title' => $title]);
        
    }
    
    public function leagues()
    {

        $posts = Competition::where([['is_league', 1], ['status', 1]])->get();
        $setting = Setting::first();
        $title = 'Leagues';

        $seo = ['title' => 'Leagues | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];
        
        return view('frontend/competitions/index', ['seo' => $seo, 'posts' => $posts, 'setting' => $setting, 'title' => $title]);
        
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



}
