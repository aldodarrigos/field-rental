<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    protected $table = 'Matches';

    protected $fillable = [
        'crew_a_id', 
        'crew_b_id', 
        'crew_a_result',
        'crew_b_result',
        'reg_date', 
        'status'
    ];

}
