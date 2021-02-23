<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Competition, CompetitionRegistration, Category, CompetitionCategory, CompetitionContact};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Competition::orderBy('updated_at', 'desc')->get();

        $url = "competitions";
        
        return view('backend/competitions/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('competitions.store');
        $url = "competitions";
        $form = 'new';

        return view('backend/competitions/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Competition();

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

        return redirect('competitions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('competitions.update', $id);
        $content = Competition::find($id);

        $categories_array = array();
        $competition_categories = CompetitionCategory::where('competition_id', $id)->get();
        foreach ($competition_categories as $value) {
            array_push($categories_array, $value->category_id);
        }
        $categories = Category::where('status', 1)->whereNotIn('id', $categories_array)->orderBy('name', 'desc')->get();

        $put = True;
        $form = 'update';

        $url = "competitions";

        return view('backend/competitions/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form, 'categories' => $categories]);
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

        $content = Competition::find($id);

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

        return redirect('competitions/'.$id.'/edit')->with('success', 'Successful update!');

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

        $competition = Competition::where('id', $id)->first();
        $records = DB::table('competition_registration')
        ->select(DB::raw('competition_registration.id, competition_registration.fullname, competition_registration.email, competition_registration.phone, competition_registration.team, competition_registration.message, competition_registration.category_id, categories.name as cat_name, competition_registration.created_at'))
        ->leftJoin('categories', 'competition_registration.category_id', '=', 'categories.id')
        ->where('competition_registration.competition_id', $id)
        ->orderBy('competition_registration.created_at', 'desc')
        ->get();

        $url = "competitions";
        
        return view('backend/competitions/registration', ['records' => $records, 'url' => $url, 'competition' => $competition]);

    }

    public function registration_detail($id = null)
    {
        $content = DB::table('competition_registration')
        ->select(DB::raw('competition_registration.id, competition_registration.competition_id, competition_registration.fullname, competition_registration.email, competition_registration.phone, competition_registration.team, competition_registration.message, competition_registration.category_id, categories.name as cat_name, competition_registration.created_at'))
        ->leftJoin('categories', 'competition_registration.category_id', '=', 'categories.id')
        ->where('competition_registration.id', $id)
        ->first();

        $url = "competitions";
        
        return view('backend/competitions/registration-detail', ['content' => $content, 'url' => $url]);

    }

    public function contact()
    {
        $records = DB::table('competition_contact')
        ->select(DB::raw('competition_contact.id as message_id, competition_contact.competition_id, competitions.name as competition_name, competitions.slug, competitions.is_league, competition_contact.name as contact_name, competition_contact.email, competition_contact.phone, competition_contact.status, competition_contact.created_at'))
        ->leftJoin('competitions', 'competition_contact.competition_id', '=', 'competitions.id')
        ->orderBy('competition_contact.id', 'DESC')
        ->get();

        $url = "competitions";
        
        return view('backend/competitions/contact', ['records' => $records, 'url' => $url]);

    }

    public function message($id = null)
    {

        
        $message = CompetitionContact::find($id);
        $message->status = 1;
        $message->save();

        $message = CompetitionContact::where('id', $id)->first();

        $url = "competitions";
        
        return view('backend/competitions/message', ['message' => $message, 'url' => $url]);

    }


}
