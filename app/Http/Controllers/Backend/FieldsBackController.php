<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Field};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class FieldsBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Field::all();

        $url = "fields";
        
        return view('backend/fields/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('backend-fields.store');
        $url = "fields";
        $form = 'new';

        return view('backend/fields/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Field();

        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');

        $content->name = $name;
        $content->slug = $slug_input;
        
        $content->short_name = $request->input('short_name');
        $content->sumary = $request->input('sumary');
        $content->content = $request->input('content');

        $content->price_regular = $request->input('price_regular');
        $content->price_night = $request->input('price_night');
        $content->price_weekend = $request->input('price_weekend');
        $content->number = $request->input('number');

        $content->tag_id = $request->input('tag_id');
        $content->status = $request->input('status');
        $content->save();

        return redirect('backend-fields');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('backend-fields.update', $id);
        $content = Field::find($id);
        $put = True;
        $form = 'update';

        $url = "fields";

        return view('backend/fields/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $content = Field::find($id);

        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');

        $content->name = $name;
        $content->slug = $slug_input;
        $content->short_name = $request->input('short_name');

        $content->sumary = $request->input('sumary');
        $content->content = $request->input('content');

        $content->price_regular = $request->input('price_regular');
        $content->price_night = $request->input('price_night');
        $content->price_weekend = $request->input('price_weekend');
        $content->number = $request->input('number');

        $content->tag_id = $request->input('tag_id');
        $content->status = $request->input('status');
        $content->save();

        return redirect('backend-fields/'.$id.'/edit')->with('success', 'Successful update!');

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
