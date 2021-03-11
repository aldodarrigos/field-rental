<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use DB;

class ServicesMessage extends Component
{
    public function render()
    {

        $messages = DB::table('services_contact')
        ->select(DB::raw('services_contact.id as message_id, services_contact.service_id, services.name as service_name, services_contact.name as contact_name, services_contact.email, services_contact.phone, services_contact.status, services_contact.created_at'))
        ->leftJoin('services', 'services_contact.service_id', '=', 'services.id')
        ->where('services_contact.status', 0)
        ->orderBy('services_contact.created_at', 'DESC')
        ->get();

        $count = count($messages);

        return view('livewire.backend.services-message', ['messages' => $messages, 'count' => $count ]);
    }
}
