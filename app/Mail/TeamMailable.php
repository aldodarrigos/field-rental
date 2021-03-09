<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{CompetitionCrew, Crew, User, Category};

class TeamMailable extends Mailable
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
        $reservation = CompetitionCrew::where('id', $this->bookId)->first();
        $crew = Crew::where('id', $reservation->crew_id)->first();
        $user = User::where('id', $reservation->user_id)->first();
        $category = Category::where('id', $crew->category_id)->first();
        return $this->view('frontend.emails.teamSuccess', ['reservation' => $reservation, 'crew' => $crew, 'user' => $user, 'category' => $category]);
    }
}
