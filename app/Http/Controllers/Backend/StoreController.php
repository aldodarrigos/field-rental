<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Product::all();
        $url = "store";
        
        return view('backend/store/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('store.store');
        //$tags = Tag::where('status', 1)->orderBy('name', 'ASC')->get();
        $url = "store";
        $form = 'new';

        return view('backend/store/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $offer = ($request->input('offer') == null)?'0.00':$request->input('offer');
        $size_switch = ($request->input('size_switch') == null)?'0':$request->input('size_switch');
        
        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');

        $product->name = $name;
        $product->slug = $slug_input;
        
        $product->sumary = $request->input('sumary');
        $product->content = $request->input('content');

        $product->img = $request->input('img');
        $product->img_2 = $request->input('img_2');
        $product->img_3 = $request->input('img_3');
        $product->img_4 = $request->input('img_4');
        $product->img_5 = $request->input('img_5');

        $product->price = $request->input('price');
        $product->offer = $offer;
        $product->size_switch = $size_switch;
        $product->status = $request->input('status');
        $product->save();

        return redirect('store');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('store.update', $id);
        //$tags = Tag::where('status', 1)->orderBy('name', 'ASC')->get();
        $content = Product::find($id);
        $put = True;
        $form = 'update';

        $url = "store";

        return view('backend/store/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $product = Product::find($id);
        $offer = ($request->input('offer') == null)?'0.00':$request->input('offer');
        $size_switch = ($request->input('size_switch') == null)?'0':$request->input('size_switch');

        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        
        $product->sumary = $request->input('sumary');
        $product->content = $request->input('content');

        $product->img = $request->input('img');
        $product->img_2 = $request->input('img_2');
        $product->img_3 = $request->input('img_3');
        $product->img_4 = $request->input('img_4');
        $product->img_5 = $request->input('img_5');

        $product->price = $request->input('price');
        $product->offer = $offer;
        $product->size_switch = $size_switch;
        $product->status = $request->input('status');
        $product->save();

        return redirect('store/'.$id.'/edit')->with('success', 'Successful update!');

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
