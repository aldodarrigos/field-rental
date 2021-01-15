<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Slide};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Slide::orderBy('sort', 'ASC')->get();
        $records_order = Slide::where('status', 1)->orderBy('sort', 'ASC')->get();

        $url = "slides";
        
        return view('backend/slides/index', ['records' => $records, 'records_order' => $records_order, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('slides.store');
        $url = "slides";
        $form = 'new';

        return view('backend/slides/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new Slide();

        $slide->subtitle = $request->input('subtitle');
        $slide->title = $request->input('title');
        $slide->img = $request->input('img');
        $slide->link_text = $request->input('link_text');
        $slide->link_url = $request->input('link_url');
        $slide->status = $request->input('status');
        $slide->save();

        return redirect('slides');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('slides.update', $id);
        $content = Slide::find($id);
        $put = True;
        $form = 'update';

        $url = "slides";

        return view('backend/slides/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $slide = Slide::find($id);

        $slide->subtitle = $request->input('subtitle');
        $slide->title = $request->input('title');
        $slide->img = $request->input('img');
        $slide->link_text = $request->input('link_text');
        $slide->link_url = $request->input('link_url');
        $slide->status = $request->input('status');
        $slide->save();

        return redirect('slides/'.$id.'/edit')->with('success', 'Successful update!');

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
            $service = Slide::find($order_array[$i]['id']);
            $service->sort = $i;
            $service->save();
        }

        return $order_array[1]['id'];



    }


}
