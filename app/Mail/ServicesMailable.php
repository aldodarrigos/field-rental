<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{Serviceplayer};
use DB;

class ServicesMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Service Succesfull Reservation';
    public $contact;
    public $bookId;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact, $bookId)
    {
        $this->contact = $contact;
        $this->bookId = $bookId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $registration = DB::table('service_registration')
        ->select(DB::raw('service_registration.id as registration_id, 

        service_registration.service_id as service_id,
        services.name as service_name,

        service_registration.responsible_user as user_id, 
        service_registration.address, 
        service_registration.city, 
        service_registration.zip, 
        service_registration.phone_home, 
        service_registration.phone_cell,
        service_registration.emergency_contact,
        service_registration.emergency_phone,
        service_registration.price as final_price,
        service_registration.payment_code,
        service_registration.status as registration_status,
        service_registration.updated_at as registration_updated_at,

        users.name as user_name, users.email as user_email, users.phone as user_phone'))

        ->leftJoin('users', 'service_registration.responsible_user', '=', 'users.id')
        ->leftJoin('services', 'service_registration.service_id', '=', 'services.id')
        ->where('service_registration.id', $this->bookId)
        ->first();

        $players = Serviceplayer::where('registration_id', $registration->registration_id)->get();

        return $this->view('frontend.emails.serviceSuccess', ['reservation' => $registration, 'players' => $players]);
    }
}
