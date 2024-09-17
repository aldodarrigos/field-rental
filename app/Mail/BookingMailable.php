<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{Reservation, Field, User};

class BookingMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Field Succesfull Booking';
    public $contact;
    public $code;
    public $field_id;
    public $user_id;
    public $paypal_code;
    public $coupon;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact, $code, $field_id, $user_id, $paypal_code, $coupon)
    {
        $this->contact = $contact;
        $this->code = $code;
        $this->field_id = $field_id;
        $this->user_id = $user_id;
        $this->paypal_code = $paypal_code;
        $this->coupon = $coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reservation = Reservation::where('code', $this->code)->get();
        $field = Field::where('id', $this->field_id)->first();
        $user = User::where('id', $this->user_id)->first();
        return $this->view('frontend.emails.successbooking', ['reservation' => $reservation, 'coupon' => $this->coupon, 'field' => $field, 'user' => $user, 'code' => $this->code, $this->paypal_code]);
    }
}
