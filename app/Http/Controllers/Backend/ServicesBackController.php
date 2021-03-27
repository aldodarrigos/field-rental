<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Service, ServiceRegistration, ServiceContact, Serviceplayer};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class ServicesBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Service::orderBy('sort', 'ASC')->get();
        $url = "services";
        return view('backend/services/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('backend-services.store');
        $url = "services";
        $form = 'new';

        return view('backend/services/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();

        $price = ($request->input('price') == null)?'0.00':$request->input('price');
        $price_alt = ($request->input('price_alt') == null)?'0.00':$request->input('price_alt');
        $reg_available = ($request->input('reg_available') == null)?'0':$request->input('reg_available');
        $flag = ($request->input('flag'))?1:0;

        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');
        $service->name = $name;
        $service->slug = $slug_input;
        $service->sumary = $request->input('sumary');
        $service->content = $request->input('content');
        $service->img = $request->input('img');
        $service->flag = $flag;
        $service->price = $price;
        $service->price_alt = $price_alt;
        $service->reg_available = $reg_available;
        $service->icon = $request->input('icon');
        $service->status = $request->input('status');
        
        $service->save();

        return redirect('backend-services');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('backend-services.update', $id);
        $content = Service::find($id);
        $put = True;
        $form = 'update';

        $url = "services";

        return view('backend/services/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $service = Service::find($id);
        $price = ($request->input('price') == null)?'0.00':$request->input('price');
        $price_alt = ($request->input('price_alt') == null)?'0.00':$request->input('price_alt');
        $reg_available = ($request->input('reg_available') == null)?'0':$request->input('reg_available');
        $flag = ($request->input('flag'))?1:0;

        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');
        $service->name = $name;
        $service->slug = $slug_input;
        $service->sumary = $request->input('sumary');
        $service->content = $request->input('content');
        $service->img = $request->input('img');
        $service->flag = $flag;
        $service->reg_available = $reg_available;
        $service->price = $price;
        $service->price_alt = $price_alt;
        $service->icon = $request->input('icon');
        $service->status = $request->input('status');
        
        $service->save();

        return redirect('backend-services/'.$id.'/edit')->with('success', 'Successful update!');

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

    public function show()
    {
        $records = Service::where('status', 1)->orderBy('sort', 'ASC')->get();
        $url = "services";
        return view('backend/services/sort', ['records' => $records, 'url' => $url]);
    }

    public function sort()
    {
        $order = $_POST["order"];
        $order_array = json_decode($order, true);


        for ($i=0; $i < count($order_array); $i++) { 
            $service = Service::find($order_array[$i]['id']);
            $service->sort = $i;
            $service->save();
        }

        return $order_array[1]['id'];

    }

    public function registration()
    {

        $records = DB::table('service_players')
        ->select(DB::raw('service_registration.id as registration_id, 
        users.name as reg_user, 
        service_players.id as player_id, 
        service_players.name as player_name, 
        service_players.age, 
        service_players.gender, 
        service_players.tshirt_size, 
        service_players.grade, 
        service_players.obs, 
        services.name as service_name, 
        service_registration.status, 
        service_registration.read, 
        service_registration.updated_at'))

        
        ->leftJoin('service_registration', 'service_players.registration_id', '=', 'service_registration.id')
        ->leftJoin('users', 'service_registration.responsible_user', '=', 'users.id')
        ->leftJoin('services', 'service_registration.service_id', '=', 'services.id')
        ->orderBy('service_registration.updated_at', 'desc')
        ->get();


        $url = "services";
        return view('backend/services/registration', ['records' => $records, 'url' => $url]);

    }
    
    public function registration_detail($id = null)
    {

        $record = DB::table('service_registration')
        ->select(DB::raw('service_registration.id as registration_id, 
        users.name as reg_user, 
        users.email as email, 
        users.phone as phone, 
        services.name as service,
        service_registration.address, 
        service_registration.city, 
        service_registration.zip, 
        service_registration.price, 
        service_registration.phone_home, 
        service_registration.phone_cell, 

        service_registration.emergency_contact, 
        service_registration.emergency_phone, 
        service_registration.payment_code, 
        service_registration.status,
        service_registration.updated_at as date'))

        ->leftJoin('users', 'service_registration.responsible_user', '=', 'users.id')
        ->leftJoin('services', 'service_registration.service_id', '=', 'services.id')
        ->where('service_registration.id', $id)
        ->first();

        $players = Serviceplayer::where('registration_id', $record->registration_id)->orderBy('id', 'DESC')->get();

        $reservation = ServiceRegistration::where('id', $id)->first();
        $reservation->read = 1;
        $reservation->save();

        $url = "services";
        return view('backend/services/registration-detail', ['record' => $record, 'url' => $url, 'players' => $players]);

    }


    
    public function contact()
    {
        $records = DB::table('services_contact')
        ->select(DB::raw('services_contact.id as message_id, services_contact.service_id, services.name as service_name, services_contact.name as contact_name, services_contact.email, services_contact.phone, services_contact.status, services_contact.created_at'))
        ->leftJoin('services', 'services_contact.service_id', '=', 'services.id')
        ->orderBy('services_contact.id', 'DESC')
        ->get();

        $url = "services";
        
        return view('backend/services/contact', ['records' => $records, 'url' => $url]);

    }

    public function message($id = null)
    {

        
        $message = ServiceContact::find($id);
        $message->status = 1;
        $message->save();

        $message = ServiceContact::where('id', $id)->first();
        $service = Service::where('id', $message->service_id)->first();
        $url = "services";
        
        return view('backend/services/message', ['message' => $message, 'url' => $url, 'service' => $service]);

    }




}
