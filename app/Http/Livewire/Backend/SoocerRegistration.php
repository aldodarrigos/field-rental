<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use DB;

class SoocerRegistration extends Component
{
    public function render()
    {

        $new_players = DB::table('summerclinic_players')
        ->select(DB::raw('summerclinic_players.id as player_id, 
        summerclinic_registration.id as registration_id,
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
        ->where('summerclinic_registration.read', 0)
        ->orderBy('summerclinic_players.updated_at', 'desc')
        ->get();

        $count = count($new_players);

        return view('livewire.backend.soocer-registration', ['new_players' => $new_players, 'count' => $count ]);
    }
}
