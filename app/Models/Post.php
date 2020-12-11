<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'sumary',
        'content',
        'img', 
        'img_md', 
        'img_sm', 
        'tag_id', 
        'pub_date', 
        'status'
    ];

}
