<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Post;
use Livewire\Component;
use DB;

class CoverNews extends Component
{
    public function render()
    {

        $posts = DB::table('posts')
        ->select(DB::raw('posts.id, posts.title, posts.slug, posts.sumary, posts.img, posts.pub_date, tags.name as tag_name, tags.slug as tag_slug'))
        ->leftJoin('tags', 'posts.tag_id', '=', 'tags.id')
        ->where('posts.status', 1)
        ->orderBy('posts.pub_date', 'desc')
        ->limit(3)
        ->get();

        return view('livewire.frontend.cover-news', ['posts' => $posts]);
    }
}
