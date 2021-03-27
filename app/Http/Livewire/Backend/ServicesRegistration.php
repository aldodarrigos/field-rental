<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use DB;

class ServicesRegistration extends Component
{
    public function render()
    {

        $new_players = DB::table('service_players')
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
        service_registration.updated_at'))

        
        ->leftJoin('service_registration', 'service_players.registration_id', '=', 'service_registration.id')
        ->leftJoin('users', 'service_registration.responsible_user', '=', 'users.id')
        ->leftJoin('services', 'service_registration.service_id', '=', 'services.id')
        ->where('service_registration.read', 0)
        ->orderBy('service_registration.updated_at', 'desc')
        ->get();

        $count = count($new_players);

        return view('livewire.backend.services-registration', ['new_players' => $new_players, 'count' => $count ]);
    }
}
