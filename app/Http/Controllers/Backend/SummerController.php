<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Summerclinic, CompetitionStatus, Summerclinicreg, Summerclinicplay};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class SummerController extends Controller
{

    public function index()
    {
        $records = Summerclinic::orderBy('updated_at', 'desc')->get();
        $status = CompetitionStatus::orderBy('id', 'ASC')->get();
        $url = "services";
        
        return view('backend/summer/index', ['records' => $records, 'url' => $url, 'status' => $status]);

    }


    public function create()
    {
        $status = CompetitionStatus::orderBy('id', 'ASC')->get();
        $action = route('summerclin.store');
        $url = "services";
        $form = 'new';

        return view('backend/summer/create', ['action' => $action, 'url' => $url, 'form' => $form, 'status' => $status]);
    }
    

    public function store(Request $request)
    {
        $content = new Summerclinic();

        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');
        $second_child_price = ($request->input('second_child_price') == null)?0:$request->input('second_child_price');

        $content->name = $name;
        $content->slug = $slug_input;
        $content->sumary = $request->input('sumary');
        $content->content = $request->input('content');
        $content->img = $request->input('img');
        $content->price = $request->input('price');
        $content->price_alt = $second_child_price;
        $content->status = $request->input('status');
        $content->save();

        return redirect('summerclin');
    }


    public function edit($id)
    {
        
        $action = route('summerclin.update', $id);
        $content = Summerclinic::find($id);
        $status = CompetitionStatus::orderBy('id', 'ASC')->get();

        $put = True;
        $form = 'update';

        $url = "services";

        return view('backend/summer/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form, 'status' => $status]);
    }


    public function update(Request $request, $id)
    {

        $content = Summerclinic::find($id);

        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');
        $second_child_price = ($request->input('second_child_price') == null)?0:$request->input('second_child_price');

        $content->name = $name;
        $content->slug = $slug_input;
        $content->sumary = $request->input('sumary');
        $content->content = $request->input('content');
        $content->img = $request->input('img');
        $content->price = $request->input('price');
        $content->price_alt = $second_child_price;
        $content->status = $request->input('status');
        $content->save();

        return redirect('summerclin/'.$id.'/edit')->with('success', 'Successful update!');

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

        $records = DB::table('summerclinic_players')
        ->select(DB::raw('summerclinic_players.id as player_id, 
        summerclinic_registration.id as registration_id,
        summerclinic_players.registration_id as event_id, 
        summerclinic.id as event_id,
        summerclinic.name as event_name,
        summerclinic_players.name as player_name, 
        summerclinic_players.age as player_age, 
        summerclinic_players.gender as player_gender, 
        summerclinic_players.tshirt_size as player_tshirt, 
        summerclinic_players.obs as player_obs, 
        summerclinic_players.updated_at as player_date,
        
        users.name as user_name, users.id as user_id
        '))

        ->leftJoin('summerclinic_registration', 'summerclinic_players.registration_id', '=', 'summerclinic_registration.id')
        ->leftJoin('summerclinic', 'summerclinic_registration.event_id', '=', 'summerclinic.id')
        ->leftJoin('users', 'summerclinic_registration.user_id', '=', 'users.id')
        ->where('summerclinic_registration.event_id', $id)
        ->orderBy('summerclinic_players.updated_at', 'desc')
        ->get();

        $event = Summerclinic::where('id', $id)->first();

        $url = "services";
        
        return view('backend/summer/registration', ['records' => $records, 'url' => $url, 'event' => $event]);

    }

    public function registration_detail($id)
    {
        
        $record = DB::table('summerclinic_registration')
        ->select(DB::raw('summerclinic_registration.id as registration_id, 
        
        summerclinic.id as event_id, 
        summerclinic.name as event_name, 
        
        users.name as registrant, users.email as email, users.phone as phone,

        summerclinic_registration.address, 
        summerclinic_registration.city, 
        summerclinic_registration.zip, 
        summerclinic_registration.phone_home, 
        summerclinic_registration.phone_cell, 
        summerclinic_registration.emergency_contact, 
        summerclinic_registration.emergency_phone, 
        summerclinic_registration.price, 
        summerclinic_registration.payment_code, 
        summerclinic_registration.status, 
        summerclinic_registration.updated_at as date
        '))

        ->leftJoin('summerclinic', 'summerclinic_registration.event_id', '=', 'summerclinic.id')
        ->leftJoin('users', 'summerclinic_registration.user_id', '=', 'users.id')
        
        ->where('summerclinic_registration.id', $id)
        ->first();

        $players = Summerclinicplay::where('registration_id', $record->registration_id)->get();

        $url = "services";
        
        return view('backend/summer/registration_detail', ['record' => $record, 'players' => $players, 'url' => $url]);

    }

   

}
