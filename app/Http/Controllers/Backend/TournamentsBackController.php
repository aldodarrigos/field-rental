<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Tournament, Tournament_registration, Category, Tournament_category};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class TournamentsBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Tournament::orderBy('updated_at', 'desc')->get();

        $url = "tournaments";
        
        return view('backend/tournaments/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('backend-tournaments.store');
        $url = "tournaments";
        $form = 'new';

        return view('backend/tournaments/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Tournament();

        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');

        $content->name = $name;
        $content->slug = $slug_input;
        $content->sumary = $request->input('sumary');
        $content->content = $request->input('content');
        $content->img = $request->input('img');
        $content->price = $request->input('price');
        $content->is_league = $request->input('is_league');
        $content->status = $request->input('status');
        $content->save();

        return redirect('backend-tournaments');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('backend-tournaments.update', $id);
        $content = Tournament::find($id);

        $categories_array = array();
        $tournament_categories = Tournament_category::where('tournament_id', $id)->get();
        foreach ($tournament_categories as $value) {
            array_push($categories_array, $value->category_id);
        }
        $categories = Category::where('status', 1)->whereNotIn('id', $categories_array)->orderBy('name', 'desc')->get();

        $put = True;
        $form = 'update';

        $url = "tournaments";

        return view('backend/tournaments/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $content = Tournament::find($id);

        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');

        $content->name = $name;
        $content->slug = $slug_input;
        $content->sumary = $request->input('sumary');
        $content->content = $request->input('content');
        $content->img = $request->input('img');
        $content->price = $request->input('price');
        $content->is_league = $request->input('is_league');
        $content->status = $request->input('status');
        $content->save();

        return redirect('backend-tournaments/'.$id.'/edit')->with('success', 'Successful update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function registration($id = null)
    {

        $tournament = Tournament::where('id', $id)->first();
        $records = DB::table('tournament_registration')
        ->select(DB::raw('tournament_registration.id, tournament_registration.fullname, tournament_registration.email, tournament_registration.phone, tournament_registration.team, tournament_registration.message, tournament_registration.category_id, categories.name as cat_name, tournament_registration.created_at'))
        ->leftJoin('categories', 'tournament_registration.category_id', '=', 'categories.id')
        ->where('tournament_registration.tournament_id', $id)
        ->orderBy('tournament_registration.created_at', 'desc')
        ->get();

        $url = "tournaments";
        
        return view('backend/tournaments/registration', ['records' => $records, 'url' => $url, 'tournament' => $tournament]);

    }

    public function registration_detail($id = null)
    {
        $content = DB::table('tournament_registration')
        ->select(DB::raw('tournament_registration.id, tournament_registration.tournament_id, tournament_registration.fullname, tournament_registration.email, tournament_registration.phone, tournament_registration.team, tournament_registration.message, tournament_registration.category_id, categories.name as cat_name, tournament_registration.created_at'))
        ->leftJoin('categories', 'tournament_registration.category_id', '=', 'categories.id')
        ->where('tournament_registration.id', $id)
        ->first();

        $url = "tournaments";
        
        return view('backend/tournaments/registration-detail', ['content' => $content, 'url' => $url]);

    }


}
