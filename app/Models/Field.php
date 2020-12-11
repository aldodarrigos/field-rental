<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'sumary',
        'content',
        'img', 
        'img_md', 
        'img_sm', 
        'price', 
        'tag_id', 
        'status'
    ];

}
