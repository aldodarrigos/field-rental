<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'sumary',
        'content',
        'img', 
        'img_md', 
        'price', 
        'tag_id', 
        'is_league',
        'status'
    ];

}
