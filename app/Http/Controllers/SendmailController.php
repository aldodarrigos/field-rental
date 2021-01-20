<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;
use App\Mail\BookingMailable;
use Illuminate\Support\Facades\Mail;

class SendmailController extends Controller
{
    
    public function successbooking($contact = null, $bookId = null)
    {

        $correo = new BookingMailable($contact, $bookId);
        Mail::to($contact)->send($correo);
        return "Mensaje enviado";
        
    }





}
