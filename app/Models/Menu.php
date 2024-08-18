<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    // protected $appends = ['is_children', 'children'];
    protected $fillable = [
        'name',
        'slug',
        'sort',
        'status',
        'parent_id'
    ];

    // public function getIsChildrenAttribute()
    // {
    //     // return true;
    //     if ($this->parent_id == 0)
    //         return false;
    //     return true;
    // }
    // public function getChildrenAttribute()
    // {
    //     // return true;
    //     return [];
    // }

    public function children()
    {
        return $this->hasMany($this, 'parent_id')->orderBy('sort', 'asc');
    }

    // public function parent() {
    //     return $this->belongsTo('Category','parent');
    // }
}
