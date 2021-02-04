<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament_registration extends Model
{
    use HasFactory;
    protected $table = 'tournament_registration';

    protected $fillable = [
        'fullname', 
        'email',
        'phone',
        'category_id',
        'team',
        'number_players',
        'gender',
        'message',
    ];
}
