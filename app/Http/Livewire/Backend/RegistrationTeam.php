<?php

namespace App\Http\Livewire\Backend;
use App\Models\{Crew};
use Livewire\Component;
use DB;

class RegistrationTeam extends Component
{
    public function render()
    {

        $new_crews = DB::table('crews')
        ->select(DB::raw('crews.id as crew_id, crews.name as crew_name, crews.updated_at as updated_at,
        competitions.name as competition_name'))
        ->leftJoin('competition_crews', 'crews.id', '=', 'competition_crews.crew_id')
        ->leftJoin('competitions', 'competition_crews.competition_id', '=', 'competitions.id')
        ->where('crews.read', 0)
        ->orderBy('competition_crews.updated_at', 'DESC')
        ->get();

        $count = count($new_crews);

        return view('livewire.backend.registration-team', ['new_crews' => $new_crews, 'count' => $count ]);
    }
}
