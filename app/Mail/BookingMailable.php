<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{Reservation, Field};

class BookingMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Succesfull Booking';
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
        $reservation = Reservation::where('id', $this->bookId)->first();
        $field = Field::where('id', $reservation->field_id)->first();
        return $this->view('emails.successbooking', ['reservation' => $reservation, 'field' => $field]);
    }
}
