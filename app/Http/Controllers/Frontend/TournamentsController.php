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
    
    public function tournaments($slug)
    {

        $tournament = Tournament::where('slug', $slug)->first();
        $setting = Setting::first();
        
        return view('frontend/tournaments/tournament', ['seo' => 'xxx', 'tournament' => $tournament, 'setting' => $setting]);
        
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

        return view('frontend/tournaments/registration', ['seo' => 'xxx', 'tournament' => $tournament, 'setting' => $setting, 'categories' => $categories]);
        
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
