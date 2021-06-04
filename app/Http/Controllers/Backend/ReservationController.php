<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Reservation, Field, Setting};
use DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = DB::table('reservations')
        ->select(DB::raw('reservations.id, reservations.code, users.name as user_name, users.email as user_email, fields.name as field_name, fields.number as field_number, reservations.hour as hour, reservations.res_date as res_date, reservations.price as price, reservations.conf_code as res_code, reservations.created_at as created_at, reservations.note, reservations.user_rel'))
        ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
        ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
        ->orderBy('reservations.created_at', 'desc')
        ->get();

        $url = "reservations";
        
        return view('backend/reservations/index', ['reservations' => $reservations, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $fields = Field::where('status', 1)->orderBy('number', 'ASC')->get();
        $action = route('booking.store');
        $url = "reservations";
        $setting = Setting::first();

        $season = $setting->season;
        $hot_hours = ['18:00', '19:00', '20:00', '21:00'];
        if($season == 1){
            $hot_hours = ['20:00', '21:00'];
        }
        
        $hours = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];
        $hoursarray = array();
        
        $players_number = '';
        $field_id = '';
        $date = '';

        if($request->input('field')){

            $field_id = $request->input('field');
            $players_number = $request->input('players_number');
            $date = $request->input('date');
            $field = Field::where('id', $field_id)->first();

            $reservations = Reservation::where([
                ['field_id', $field->id],
                ['res_date', $date]
            ])->get();

            foreach($hours as $item){

                if((date('N', strtotime($date)) >= 6)){
                    $price = $field->price_weekend;
                    $price_alt = $field->price_weekend_alt;
                    $mark = 'w';
                }else{
                    if(in_array($item, $hot_hours)){
                        $price = $field->price_night;
                        $price_alt = $field->price_night_alt;
                        $mark = 'h';
                    }else{
                        $price = $field->price_regular;
                        $price_alt = $field->price_regular_alt;
                        $mark = 'r';
                    }
                }

                if($this->check_hours($item, $field->id, $date)){
                    array_push($hoursarray, 
                    ['hour' => $item, 
                    'class' => 'taken',
                    'price' => $price,
                    'price_alt' => $price_alt,
                    'mark' => $mark
                    ]);
                }else{
                    array_push($hoursarray, [
                        'hour' => $item, 
                        'class' => 'noselect',
                        'price' => $price,
                        'price_alt' => $price_alt,
                        'mark' => $mark
                        ]);
                }
            }

            $result = 1;


        }else{
            $field = 0;
            $reservations = 0;
            $date = 0;
            $result = 0;
        }


        return view('backend/reservations/create', ['action' => $action, 'url' => $url, 'result' => $result, 'field' => $field, 'field_id' => $field_id, 'date' => $date, 'fields' => $fields, 'reservations' => $reservations, 'hoursarray' => $hoursarray, 'players_number' => $players_number]);
    }

    public function check_hours($hour, $field, $date){

        $reservations = Reservation::where([
            ['field_id', $field],
            ['res_date', $date]
        ])->get();

        foreach($reservations as $item){
            if($hour == $item->hour){
                return true;
                break;
            }
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $short_name = $request->input('fieldShortName');
        $field_id = $request->input('fieldIdSelected');
        $user_id = $request->input('userIdLogin');
        $date = $request->input('dateSelected');
        $note = $request->input('note');
        $user_rel = $request->input('user_rel');
        $booking_array = json_decode($request->input('bookingArray'));
        $code = str_replace( array( '-', ':' ), '', $short_name.$date.rand(1000,9999)); 

        //$alt_price = $request->input('alt_price');
        //$final_price = ($alt_price > 0.00)?$alt_price:$price;

        for ($i=0; $i < count($booking_array) ; $i++) { 

            $reservation = new Reservation();
            $reservation->user_id = $user_id;
            $reservation->code = $code;
            $reservation->field_id = $field_id;
            $reservation->res_date = $date;
            $reservation->hour = $booking_array[$i][0];
            $reservation->price = $booking_array[$i][1];
            $reservation->note = $note;
            $reservation->user_rel = $user_rel;
            $reservation->save();

        }

        return redirect('booking');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('booking.update', $id);
        $reservation = DB::table('reservations')
        ->select(DB::raw('reservations.id, 
        reservations.code, 
        users.name as user_name, users.email as user_email, users.phone as user_phone,
        
        fields.id as field_id, 
        fields.name as field_name, 
        
        reservations.hour as hour, 
        reservations.res_date as res_date, 
        reservations.price as price, 
        reservations.conf_code as res_code, 
        reservations.created_at as created_at, 
        reservations.updated_at as updated_at, 
        reservations.note,
        reservations.user_rel'))

        ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
        ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
        ->where('reservations.id', $id)
        ->orderBy('reservations.created_at', 'desc')
        ->first();

        $fields = Field::where('status', 1)->orderBy('name', 'ASC')->get();

        $url = "reservations";

        return view('backend/reservations/update')->with(compact('reservation', 'action', 'url', 'fields'));
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

        $booking = Reservation::find($id);
        $booking->field_id = $request->input('field_id');
        $booking->hour = $request->input('hour');
        $booking->price = $request->input('price');
        $booking->res_date = $request->input('date');
        $booking->note = $request->input('note');
        $booking->user_rel = $request->input('user_rel');
        $booking->save();

        return redirect('booking/'.$id.'/edit')->with('success', 'Successful update!');

    }

    public function show($id)
    {

        $reservation = DB::table('reservations')
        ->select(DB::raw('reservations.id, reservations.code, reservations.code, users.name as user_name, users.email as user_email, fields.name as field_name, reservations.hour as hour, reservations.res_date as res_date, reservations.price as price, reservations.conf_code as res_code, reservations.created_at as created_at, reservations.note, reservations.user_rel'))
        ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
        ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
        ->where('reservations.id', $id)
        ->orderBy('reservations.created_at', 'desc')
        ->first();

        $url = "reservations";

        return view('backend/reservations/show', ['reservation' => $reservation, 'url' => $url]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Reservation::find($id);
        $menu->delete();

        return redirect('booking')->with('success','Reservation deleted.');
    }

    public function calendar(){

        $reservations = Reservation::all();
        $url = 'reservations';

        return view('backend/reservations/calendar', ['reservations' => $reservations, 'url' => $url]);
    }

    public function get_reservations()
    {
        $array = [];
        //$reservations = Reservation::orderBy('res_date', 'DESC')->get();

        $reservations = DB::table('reservations')
        ->select(DB::raw('reservations.id, reservations.code, users.name as user_name, fields.name as field_name, fields.short_name as field_short_name, fields.number as field_number, reservations.hour, reservations.res_date, reservations.note as note, reservations.user_rel as user_rel'))
        ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
        ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
        ->orderBy('reservations.res_date', 'desc')
        ->get();
        
        $options = '<option value="0" selected="">Pick a Field --</option>';
        foreach($reservations as $item){

            $name = ($item->user_rel != '')?$item->user_rel:$item->user_name;

            array_push($array, array(
                'title' => $name.' - '.$item->field_short_name.' ('.$item->field_number.')', 
                'start' => $item->res_date.' '.$item->hour,
                'url' => '/booking/'.$item->id,
                'note' => $item->field_name.' ('.$item->field_number.')'.' / '.$item->res_date.' / '.date('h A', strtotime($item->hour)),            ));
        }
        return $array;
        
    }

    public function get_detail($id)
    {

        $reservation = DB::table('reservations')
        ->select(DB::raw('reservations.id, 
        reservations.code, 
        
        users.name as user_name, users.email as user_email, users.phone as user_phone,
        
        fields.id as field_id, 
        fields.name as field_name, 
        
        TIME_FORMAT(reservations.hour, "%l:%i %p") as hour, 
        DATE_FORMAT(reservations.res_date, "%b %d, %Y") as res_date, 
        reservations.price as price, 
        reservations.conf_code as res_code, 
        DATE_FORMAT(reservations.updated_at, "%b %d, %Y %H:%i:%s") as updated_at, 
        reservations.note,
        reservations.user_rel'))

        ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
        ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
        ->where('reservations.id', $id)
        ->limit(1)
        ->get();
        

        return $reservation;
        
    }


    public function fields(Request $request){

        $now = date('Y-m-d');

        $date = ($request->input('date'))?$request->input('date'):$now;

        $hours = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];

        $hour_9am = $this->hour_reservation('09:00', $date);
        $hour_10am = $this->hour_reservation('10:00', $date);
        $hour_11am = $this->hour_reservation('11:00', $date);
        $hour_12pm = $this->hour_reservation('12:00', $date);
        $hour_1pm = $this->hour_reservation('13:00', $date);
        $hour_2pm = $this->hour_reservation('14:00', $date);
        $hour_3pm = $this->hour_reservation('15:00', $date);
        $hour_4pm = $this->hour_reservation('16:00', $date);
        $hour_5pm = $this->hour_reservation('17:00', $date);
        $hour_6pm = $this->hour_reservation('18:00', $date);
        $hour_7pm = $this->hour_reservation('19:00', $date);
        $hour_8pm = $this->hour_reservation('20:00', $date);
        $hour_9pm = $this->hour_reservation('21:00', $date);

        $url = 'reservations';

        $fields = Field::where('status', 1)->orderBy('number', 'ASC')->get();

        return view('backend/reservations/fields', [
            'url' => $url, 
            'fields' => $fields, 
            'date' => $date, 
            'hour_9am' => $hour_9am, 
            'hour_10am' => $hour_10am, 
            'hour_11am' => $hour_11am,
            'hour_12pm' => $hour_12pm,
            'hour_1pm' => $hour_1pm,
            'hour_2pm' => $hour_2pm,
            'hour_3pm' => $hour_3pm,
            'hour_4pm' => $hour_4pm,
            'hour_5pm' => $hour_5pm,
            'hour_6pm' => $hour_6pm,
            'hour_7pm' => $hour_7pm,
            'hour_8pm' => $hour_8pm,
            'hour_9pm' => $hour_9pm,
            ],
    
        );
    }

    public function hour_reservation($hour, $date){

        $fields = Field::where('status', 1)->orderBy('number', 'ASC')->get();
        $hoursarray = array();

        foreach ($fields as $field) {
            $result = $this->check_hours_calendar($hour, $field->id, $date);
            if( $result != 'fail'){
                $user_name = ($result->user_rel != '')?$result->user_rel:$result->user_name;
                array_push($hoursarray, 
                ['res_id' => $result->res_id, 
                'user' => $user_name
                ]);
            }else{
                array_push($hoursarray, 
                    ['res_id' => '000', 
                    'user' => 'Available'
                    ]);
            }

        }

        return $hoursarray;

    }
    public function check_hours_calendar($hour, $field, $date){

        $reservations = DB::table('reservations')
        ->select(DB::raw('reservations.id AS res_id, users.name AS user_name, fields.id as field_id, fields.name AS field_name, reservations.res_date, reservations.hour, reservations.note as note, reservations.user_rel as user_rel'))
        ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
        ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
        ->where('reservations.res_date', $date)
        ->where('reservations.field_id', $field)
        ->where('reservations.hour', $hour)
        ->limit(1)
        ->first();

        $return = ($reservations)?$reservations:'fail';

        return $return;

    }
}
