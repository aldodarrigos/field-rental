<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use DB;

class RegistrationTryout extends Component
{
    public function render()
    {
        
        $new_players = DB::table('trials')
        ->select(DB::raw('trials.competition_id, trials.registration_id, trials.name as player_name, 
        competitions.name as competition_name, competition_trials.updated_at as updated_at'))
        ->leftJoin('competition_trials', 'trials.registration_id', '=', 'competition_trials.id')
        ->leftJoin('competitions', 'competition_trials.competition_id', '=', 'competitions.id')
        ->where('trials.read', 0)
        ->orderBy('competition_trials.updated_at', 'DESC')
        ->get();

        $count = count($new_players);

        return view('livewire.backend.registration-tryout', ['new_players' => $new_players, 'count' => $count ]);
    }
}
