<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post, Tag};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class NewsBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Post::all();

        $records = DB::table('posts')
        ->select(DB::raw('posts.id, posts.title, tags.name as tag_name, posts.pub_date, posts.status'))
        ->leftJoin('tags', 'posts.tag_id', '=', 'tags.id')
        ->orderBy('posts.pub_date', 'desc')
        ->get();

        $url = "news";
        
        return view('backend/news/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('backend-news.store');
        $tags = Tag::where('status', 1)->orderBy('name', 'ASC')->get();
        $url = "news";
        $form = 'new';

        return view('backend/news/create', ['action' => $action, 'url' => $url, 'form' => $form, 'tags' => $tags]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();

        $title = $request->input('title');
        $slug_input = Str::of($title)->slug('-');

        $post->title = $title;
        $post->slug = $slug_input;
        
        $post->sumary = $request->input('sumary');
        $post->content = $request->input('content');

        $post->img = $request->input('img');

        $post->tag_id = $request->input('tag_id');
        $post->pub_date = $request->input('pub_date');
        $post->status = $request->input('status');
        $post->save();

        return redirect('backend-news');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('backend-news.update', $id);
        $tags = Tag::where('status', 1)->orderBy('name', 'ASC')->get();
        $content = Post::find($id);
        $put = True;
        $form = 'update';

        $url = "news";

        return view('backend/news/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        
        $post->sumary = $request->input('sumary');
        $post->content = htmlentities($request->input('content'));

        $post->img = $request->input('img');

        $post->tag_id = $request->input('tag_id');
        $post->pub_date = $request->input('pub_date');
        $post->status = $request->input('status');
        $post->save();

        return redirect('backend-news/'.$id.'/edit')->with('success', 'Successful update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
