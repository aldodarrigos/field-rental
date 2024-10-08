<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
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
        'sort', 
        'flag', 
        'status'
    ];

}
