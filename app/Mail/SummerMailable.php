<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{Summerclinicplay};
use DB;

class SummerMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Soccer Clinic Succesfull Reservation';
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

        $registration = DB::table('summerclinic_registration')
        ->select(DB::raw('summerclinic_registration.id as registration_id, 

        summerclinic.id as event_id,
        summerclinic.name as event_name,
        summerclinic.sumary as event_sumary,
        summerclinic.img as event_img,
        summerclinic.status as event_status,

        summerclinic_registration.user_id, 
        summerclinic_registration.address, 
        summerclinic_registration.city, 
        summerclinic_registration.zip, 
        summerclinic_registration.phone_home, 
        summerclinic_registration.phone_cell,
        summerclinic_registration.emergency_contact,
        summerclinic_registration.emergency_phone,
        summerclinic_registration.price as final_price,
        summerclinic_registration.payment_code,
        summerclinic_registration.status as registration_status,
        summerclinic_registration.updated_at as registration_updated_at,

        users.name as user_name, users.email as user_email, users.phone as user_phone'))

        ->leftJoin('users', 'summerclinic_registration.user_id', '=', 'users.id')
        ->leftJoin('summerclinic', 'summerclinic_registration.event_id', '=', 'summerclinic.id')
        ->where('summerclinic_registration.id', $this->bookId)
        ->first();

        $players = Summerclinicplay::where('registration_id', $registration->registration_id)->get();

        $seo = ['title' => $registration->event_name.' Registration | KISC, Sports complex', 
        'sumary' => $registration->event_sumary, 
        'image' => $registration->event_img
        ];

        return $this->view('frontend.emails.summerSuccess', ['reservation' => $registration, 'players' => $players]);
    }
}
