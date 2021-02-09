<?php

namespace App\Http\Controllers\Frontend;
use App\Models\{ Tournament, Category, Tournament_registration, Setting};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use DB;

class TournamentsController extends Controller
{
    
    public function tournaments()
    {

        $posts = Tournament::where([['is_league', 0], ['status', 1]])->get();
        $setting = Setting::first();
        $title = 'Tournaments';

        $seo = ['title' => 'Tournaments | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];
        
        return view('frontend/tournaments/index', ['seo' => $seo, 'posts' => $posts, 'setting' => $setting, 'title' => $title]);
        
    }
    
    public function leagues()
    {

        $posts = Tournament::where([['is_league', 1], ['status', 1]])->get();
        $setting = Setting::first();
        $title = 'Leagues';

        $seo = ['title' => 'Leagues | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];
        
        return view('frontend/tournaments/index', ['seo' => $seo, 'posts' => $posts, 'setting' => $setting, 'title' => $title]);
        
    }
    
    public function tournament($slug)
    {

        $tournament = Tournament::where('slug', $slug)->first();
        $setting = Setting::first();

        $seo = ['title' => $tournament->name.' | KISC, Sports complex', 
        'sumary' => $tournament->sumary, 
        'image' => $tournament->img
        ];
        
        return view('frontend/tournaments/tournament', ['seo' => $seo, 'tournament' => $tournament, 'setting' => $setting]);
        
    }
    
    public function registration($id = null)
    {

        $tournament = Tournament::where('id', $id)->first();
        //$categories = Category::where('status', 1)->orderBy('id', 'ASC')->get();

        $categories = DB::table('tournament_categories')
        ->select(DB::raw('tournament_categories.id, tournament_categories.category_id, categories.name'))
        ->leftJoin('categories', 'tournament_categories.category_id', '=', 'categories.id')
        ->where('tournament_categories.tournament_id', $id)
        ->orderBy('categories.sort', 'asc')
        ->get();

        $setting = Setting::first();

        $seo = ['title' => $tournament->name.' Registration | KISC, Sports complex', 
        'sumary' => $tournament->sumary, 
        'image' => $tournament->img
        ];

        return view('frontend/tournaments/registration', ['seo' => $seo, 'tournament' => $tournament, 'setting' => $setting, 'categories' => $categories]);
        
    }

        
    public function submit(Request $request)
    {

        $id = $request->input('tournament_id');

        $registration = new Tournament_registration();
        
        $registration->tournament_id = $request->input('tournament_id');
        $registration->fullname = $request->input('fullname');
        $registration->email = $request->input('email');
        $registration->phone = $request->input('phone');

        $registration->category_id = $request->input('category');
        $registration->team = $request->input('team');
        $registration->message = $request->input('message');
        $registration->save();

        return redirect('registration/'.$id.'/xxxx')->with('success', 'Message sent!');
        
    }



}
