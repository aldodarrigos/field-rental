<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ContentGroup};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class ContentGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = ContentGroup::all();

        $url = "content";
        
        return view('backend/content-groups/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $groups = ContentGroup::where('status', 1)->get();
        $action = route('content-groups.store');
        $url = "content";
        $form = 'new';

        return view('backend/content-groups/create', ['action' => $action, 'url' => $url, 'groups' => $groups, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new ContentGroup();

        $group->name = $request->input('name');
        $group->status = $request->input('status');
        $group->save();

        return redirect('content-groups');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('content-groups.update', $id);
        $content = ContentGroup::find($id);
        $put = True;
        $form = 'update';

        $url = "content";

        return view('backend/content-groups/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $group = ContentGroup::find($id);

        $group->name = $request->input('name');
        $group->status = $request->input('status');
        $group->save();

        return redirect('content-groups/'.$id.'/edit')->with('success', 'Successful update!');

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
