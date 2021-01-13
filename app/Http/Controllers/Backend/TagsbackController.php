<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Tag};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class TagsbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Tag::all();

        $url = "news";
        
        return view('backend/tags/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('backend-tags.store');
        $url = "news";
        $form = 'new';

        return view('backend/tags/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag();

        $tag->name = $request->input('name');
        $tag->slug = $request->input('slug');
        $tag->status = $request->input('status');
        $tag->save();

        return redirect('tags');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('backend-tags.update', $id);
        $content = Tag::find($id);
        $put = True;
        $form = 'update';

        $url = "news";

        return view('backend/tags/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $tag = Tag::find($id);

        $tag->name = $request->input('name');
        $tag->slug = $request->input('slug');
        $tag->status = $request->input('status');
        $tag->save();

        return redirect('backend-tags/'.$id.'/edit')->with('success', 'Successful update!');

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
