<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Size, ProductSize};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Size::all();
        $records_sort = Size::where('status', 1)->orderBy('sort', 'ASC')->get();

        $url = "store";
        
        return view('backend/sizes/index', ['records' => $records, 'url' => $url, 'records_sort' => $records_sort]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('sizes.store');
        $url = "store";
        $form = 'new';

        return view('backend/sizes/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = new Size();
        $size->name = $request->input('name');
        $size->status = $request->input('status');
        $size->save();

        return redirect('sizes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('sizes.update', $id);
        $content = Size::find($id);
        $put = True;
        $form = 'update';

        $url = "store";

        return view('backend/sizes/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $size = Size::find($id);

        $size->name = $request->input('name');
        $size->status = $request->input('status');
        $size->save();

        return redirect('sizes/'.$id.'/edit')->with('success', 'Successful update!');

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



    public function sort()
    {
        $order = $_POST["order"];
        $order_array = json_decode($order, true);


        for ($i=0; $i < count($order_array); $i++) { 
            $category = Size::find($order_array[$i]['id']);
            $category->sort = $i;
            $category->save();
        }

        return $order_array[1]['id'];



    }

}
