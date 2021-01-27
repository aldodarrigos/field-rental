<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament_category extends Model
{
    use HasFactory;
    protected $table = 'tournament_categories';

    protected $fillable = [
        'tournament_id', 
        'category_id'
    ];
}
