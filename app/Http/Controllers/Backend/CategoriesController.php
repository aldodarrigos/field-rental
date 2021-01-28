<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Category::all();

        $url = "tournaments";
        
        return view('backend/categories/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('categories.store');
        $url = "tournaments";
        $form = 'new';

        return view('backend/categories/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->save();

        return redirect('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('categories.update', $id);
        $content = Category::find($id);
        $put = True;
        $form = 'update';

        $url = "tournaments";

        return view('backend/categories/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $category = Category::find($id);

        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->save();

        return redirect('categories/'.$id.'/edit')->with('success', 'Successful update!');

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
