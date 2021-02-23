<?php

namespace App\Http\Livewire\Backend;
use App\Models\{CompetitionContact};
use Livewire\Component;
use DB;

class CompetitionsMessages extends Component
{
    public function render()
    {

        $messages = DB::table('competition_contact')
        ->select(DB::raw('competition_contact.id as message_id, competition_contact.competition_id, competitions.name as competition_name, competitions.slug, competitions.is_league, competition_contact.name as contact_name, competition_contact.email, competition_contact.phone, competition_contact.status, competition_contact.created_at'))
        ->leftJoin('competitions', 'competition_contact.competition_id', '=', 'competitions.id')
        ->where('competition_contact.status', 0)
        ->orderBy('competition_contact.created_at', 'DESC')
        ->get();

        $count = count($messages);

        return view('livewire.backend.competitions-messages', ['messages' => $messages, 'count' => $count]);
    }
}
