<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Competition, CompetitionStatus, CompetitionRegistration, CrewPlayer, Category, CompetitionCategory, CompetitionContact, Crew, Trial};
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
        $status = CompetitionStatus::orderBy('id', 'ASC')->get();
        $url = "competitions";
        
        return view('backend/competitions/index', ['records' => $records, 'url' => $url, 'status' => $status]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = CompetitionStatus::orderBy('id', 'ASC')->get();
        $action = route('competitions.store');
        $url = "competitions";
        $form = 'new';

        return view('backend/competitions/create', ['action' => $action, 'url' => $url, 'form' => $form, 'status' => $status]);
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
        $second_child_price = ($request->input('second_child_price') == null)?0:$request->input('second_child_price');

        $content->name = $name;
        $content->slug = $slug_input;
        $content->sumary = $request->input('sumary');
        $content->content = $request->input('content');
        $content->img = $request->input('img');
        $content->price = $request->input('price');
        $content->second_child_price = $second_child_price;
        $content->is_league = $request->input('is_league');
        $content->trials = $request->input('trials');
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

        $status = CompetitionStatus::orderBy('id', 'ASC')->get();

        $put = True;
        $form = 'update';

        $url = "competitions";

        return view('backend/competitions/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form, 'categories' => $categories, 'status' => $status]);
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

        $second_child_price = ($request->input('second_child_price') == null)?0:$request->input('second_child_price');

        $content->name = $request->input('name');
        $content->slug = $request->input('slug');
        $content->sumary = $request->input('sumary');
        $content->content = $request->input('content');
        $content->img = $request->input('img');
        $content->price = $request->input('price');
        $content->second_child_price = $second_child_price;
        $content->is_league = $request->input('is_league');
        $content->trials = $request->input('trials');
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
        ->select(DB::raw('competition_registration.id, competitions.name as competition_name, competition_registration.competition_id, competition_registration.fullname, competition_registration.email, competition_registration.phone, competition_registration.team, competition_registration.message, competition_registration.number_players, competition_registration.gender, competition_registration.category_id, categories.name as cat_name, competition_registration.created_at'))
        ->leftJoin('categories', 'competition_registration.category_id', '=', 'categories.id')
        ->leftJoin('competitions', 'competition_registration.competition_id', '=', 'competitions.id')
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

    public function dashboard()
    {
        
        $records = DB::table('competition_registration')
        ->select(DB::raw('competition_registration.id, competitions.name as competition_name, competition_registration.fullname, competition_registration.email, competition_registration.phone, competition_registration.team, competition_registration.message, competition_registration.category_id, categories.name as cat_name, competition_registration.created_at'))
        ->leftJoin('categories', 'competition_registration.category_id', '=', 'categories.id')
        ->leftJoin('competitions', 'competition_registration.competition_id', '=', 'competitions.id')
        ->orderBy('competition_registration.created_at', 'desc')
        ->get();

        $url = "competitions";
        
        return view('backend/competitions/registration_dashboard', ['records' => $records, 'url' => $url]);

    }

    public function trial_dashboard()
    {
        
        $records = DB::table('trials')
        ->select(DB::raw('trials.id trial_id, 
        trials.name as player_name, 
        trials.age as player_age, 
        trials.gender as player_gender,
        trials.tshirt as player_tshirt,
        trials.read,
        categories.name as category,

        competitions.name as competition_name,

        users.name as registrant,

        competition_trials.id as registration_id,
        competition_trials.status as registration_status,
        competition_trials.updated_at as date'))

        ->leftJoin('categories', 'trials.category_id', '=', 'categories.id')
        ->leftJoin('competition_trials', 'trials.registration_id', '=', 'competition_trials.id')
        ->leftJoin('competitions', 'competition_trials.competition_id', '=', 'competitions.id')
        ->leftJoin('users', 'competition_trials.manager_id', '=', 'users.id')
        ->where('competitions.trials', 1)
        ->orderBy('trials.updated_at', 'desc')
        ->get();

        $url = "competitions";
        
        return view('backend/competitions/trials_dashboard', ['records' => $records, 'url' => $url]);

    }

    public function trial_detail($id)
    {
        
        $record = DB::table('competition_trials')
        ->select(DB::raw('competition_trials.id as registration_id, 
        competition_trials.price as registration_price, 
        competition_trials.payment_code as payment_code, 
        competition_trials.status as registration_status,
        competition_trials.updated_at as date,
        competitions.name as competition_name,

        users.name as registrant,
        users.email as email,
        users.phone as phone'))

        ->leftJoin('competitions', 'competition_trials.competition_id', '=', 'competitions.id')
        ->leftJoin('users', 'competition_trials.manager_id', '=', 'users.id')
        
        ->where('competition_trials.id', $id)
        ->first();

        $players = DB::table('trials')
        ->select(DB::raw('trials.id, trials.name, trials.age, trials.gender, categories.name as category'))
        ->leftJoin('categories', 'trials.category_id', '=', 'categories.id')
        ->where('trials.registration_id', $id)
        ->get();

        foreach ($players as $item) {
            $player = Trial::where('id', $item->id)->first();
            $player->read = 1;
            $player->save();
        }

        $url = "competitions";
        
        return view('backend/competitions/trial_detail', ['record' => $record, 'players' => $players, 'url' => $url]);

    }

    public function teams_dashboard()
    {
        
        $records = DB::table('crews')
        ->select(DB::raw('crews.id team_id, 
        crews.name as team_name, 
        crews.uniform_colors as uniforms, 
        crews.gender as gender,
        crews.read,
        categories.name as category,

        competitions.name as competition_name,

        users.name as registrant,
        competition_crews.id as registration_id,
        competition_crews.updated_at as date,
        competition_crews.status as registration_status'))

        ->leftJoin('categories', 'crews.category_id', '=', 'categories.id')
        ->leftJoin('competition_crews', 'crews.id', '=', 'competition_crews.crew_id')
        ->leftJoin('competitions', 'competition_crews.competition_id', '=', 'competitions.id')
        ->leftJoin('users', 'competition_crews.user_id', '=', 'users.id')

        ->where('competitions.trials', 0)
        ->orderBy('crews.updated_at', 'desc')
        ->get();

        $url = "competitions";
        
        return view('backend/competitions/teams_dashboard', ['records' => $records, 'url' => $url]);

    }

    public function teams_detail($id)
    {
        
        $record = DB::table('competition_crews')
        ->select(DB::raw('competition_crews.id registration_id, 
        crews.id as team_id, 
        crews.name as team_name, 
        crews.uniform_colors as uniforms, 
        crews.gender as gender,
        categories.name as category,

        competitions.name as competition_name,

        users.name as registrant, users.email, users.phone,
        competition_crews.price as price,
        competition_crews.payment_code as payment_code,
        competition_crews.updated_at as date,
        competition_crews.status as registration_status'))

        ->leftJoin('crews', 'competition_crews.crew_id', '=', 'crews.id')
        ->leftJoin('categories', 'crews.category_id', '=', 'categories.id')
        ->leftJoin('competitions', 'competition_crews.competition_id', '=', 'competitions.id')
        ->leftJoin('users', 'competition_crews.user_id', '=', 'users.id')

        ->where('competition_crews.id', $id)
        ->first();

        $team = Crew::where('id', $record->team_id)->first();
        $team->read = 1;
        $team->save();

        $players = CrewPlayer::where('crew_id', $record->team_id)->orderBy('name', 'DESC')->get();

        $url = "competitions";
        
        return view('backend/competitions/team_detail', ['record' => $record, 'players' => $players, 'url' => $url]);

    }


}
