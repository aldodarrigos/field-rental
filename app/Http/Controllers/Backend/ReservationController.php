<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Reservation};
use DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = DB::table('reservations')
        ->select(DB::raw('reservations.id, users.name as user_name, users.email as user_email, fields.name as field_name, reservations.hour as hour, reservations.res_date as res_date, reservations.price as price, reservations.conf_code as res_code, reservations.created_at as created_at'))
        ->leftJoin('users', 'reservations.user_id', '=', 'users.id')
        ->leftJoin('fields', 'reservations.field_id', '=', 'fields.id')
        ->orderBy('reservations.created_at', 'desc')
        ->get();

        $url = "reservations";
        
        return view('backend/reservations/index', ['reservations' => $reservations, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::where('group_id', 1)->get();
        $action = route('backend-posts.store');
        $url = "posts";

        return view('backend.posts.create')->with(compact('action', 'tags', 'url'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $title = $request->input('title');
        $slug_input = $request->input('slug');
        $slug = ($slug_input = "")?$slug_input:Str::of($title)->slug('-');
        

        $post = new Post();

        $post->title = $title;
        $post->slug = $slug;
        $post->sumary = $request->input('sumary');
        $post->content = $request->input('content');
        $post->img = $request->input('img');
        $post->img_med = $request->input('img_med');
        $post->img_tiny = $request->input('img_tiny');
        $post->youtube = $request->input('youtube');
        $post->tag_id = $request->input('tag_id');
        $post->pub_date = $request->input('pub_date');
        $post->status = $request->input('status');
        $post->save();

        return redirect('backend-posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('backend-posts.update', $id);
        $post = Post::find($id);
        $tags = Tag::where('group_id', 1)->get();

        $url = "posts";

        return view('backend/posts/update')->with(compact('post', 'tags', 'action', 'url'));
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
        $post->content = $request->input('content');
        $post->img = $request->input('img');
        $post->img_med = $request->input('img_med');
        $post->img_tiny = $request->input('img_tiny');
        $post->youtube = $request->input('youtube');
        $post->tag_id = $request->input('tag_id');
        $post->pub_date = $request->input('pub_date');
        $post->status = $request->input('status');
        $post->save();

        return redirect('backend-posts/'.$id.'/edit');

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

    public function get_tags_api($url, $token, $id_group){

        $client = new Client([
            'base_uri' => $url,
            'timeout'  => 10.0,
            'headers' => ['Content-Type'=> 'application/json', "Authorization"=> "Bearer ".$token.""]
        ]);

        $response_tag = $client->request('GET', 'api/tags-group/'.$id_group);
        $tags =  json_decode($response_tag->getBody()->getContents());

        return $tags;
    }
}
