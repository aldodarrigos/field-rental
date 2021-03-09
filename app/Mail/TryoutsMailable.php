<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{CompetitionTrial, Trial, Competition, User, Category};
use DB;

class TryoutsMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Succesfull Reservation';
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

        $reservation = DB::table('competition_trials')
        ->select(DB::raw('competition_trials.id as registration_id, 
        competition_trials.competition_id as competition_id, 
        competitions.name as competition_name, 
        competition_trials.price as registration_price, 
        competition_trials.status as registration_status, 
        competition_trials.manager_id as manager_id, 
        competition_trials.updated_at as registration_date,
        competition_trials.payment_code as payment_code, 
        users.name as user_name, users.email as user_email, users.phone as user_phone'))
        ->leftJoin('users', 'competition_trials.manager_id', '=', 'users.id')
        ->leftJoin('competitions', 'competition_trials.competition_id', '=', 'competitions.id')
        ->where('competition_trials.id', $this->bookId)
        ->first();

        $players = DB::table('trials')
        ->select(DB::raw('trials.name, 
        trials.age, 
        trials.gender as gender, 
        categories.name as category'))
        ->leftJoin('competitions', 'trials.competition_id', '=', 'competitions.id')
        ->leftJoin('categories', 'trials.category_id', '=', 'categories.id')
        ->where('trials.registration_id', $this->bookId)
        ->get();

        return $this->view('frontend.emails.tryoutsSuccess', ['reservation' => $reservation, 'players' => $players]);
    }
}
