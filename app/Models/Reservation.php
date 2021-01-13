<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'field_id', 
        'res_date',
        'hour',
        'price', 
        'conf_code', 
        'note'
    ];

}
