<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Content, ContentGroup};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = DB::table('content')
        ->select(DB::raw('content.id, content.title, content.shortcut, content.subtitle, content.link, content.flag, content.status as content_status, content_groups.name as group_name, content.updated_at'))
        ->leftJoin('content_groups', 'content.group_id', '=', 'content_groups.id')
        ->orderBy('content.updated_at', 'desc')
        ->get();

        $url = "content";
        
        return view('backend/content/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $groups = ContentGroup::where('status', 1)->get();
        $action = route('content.store');
        $url = "content";
        $form = 'new';

        return view('backend/content/create', ['action' => $action, 'url' => $url, 'groups' => $groups, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Content();

        $flag = ($request->input('flag'))?1:0;

        $content->title = $request->input('title');
        $content->subtitle = $request->input('subtitle');
        $content->shortcut = $request->input('shortcut');
        $content->content = $request->input('content');
        $content->img = $request->input('img');
        
        $content->link = $request->input('link');
        $content->video = $request->input('video');
        $content->group_id = $request->input('group_id');

        $content->flag = $flag;
        $content->status = $request->input('status');
        $content->save();

        return redirect('content');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('content.update', $id);
        $content = Content::find($id);
        $groups = ContentGroup::where('status', 1)->get();
        $put = True;
        $form = 'update';

        $url = "content";

        return view('backend/content/update', ['content' => $content, 'action' => $action, 'url' => $url, 'groups' => $groups, 'put' => $put,  'form' => $form]);
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

        $content = Content::find($id);

        $flag = ($request->input('flag'))?1:0;

        $content->title = $request->input('title');
        $content->subtitle = $request->input('subtitle');
        $content->shortcut = $request->input('shortcut');
        $content->content = $request->input('content');
        $content->img = $request->input('img');
        
        $content->link = $request->input('link');
        $content->video = $request->input('video');
        $content->group_id = $request->input('group_id');

        $content->flag = $flag;
        $content->status = $request->input('status');
        $content->save();

        return redirect('content/'.$id.'/edit');

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
