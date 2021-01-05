<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentGroup extends Model
{
    use HasFactory;
    protected $table = 'content_groups';

    protected $fillable = [
        'name', 
        'status'
    ];

}
