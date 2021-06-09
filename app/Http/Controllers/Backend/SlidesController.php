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

        $url = "settings";
        
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
        $url = "settings";
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

        $no_button = ($request->input('no_button'))?1:0;
        //$bottom = ($request->input('bottom'))?1:0;
        $shadow = ($request->input('shadow'))?1:0;
        $no_title = ($request->input('no_title'))?1:0;

        $slide->subtitle = $request->input('subtitle');
        $slide->title = $request->input('title');
        $slide->img = $request->input('img');
        $slide->img_mob = $request->input('img_mob');
        $slide->link_text = $request->input('link_text');
        $slide->link_url = $request->input('link_url');
        $slide->no_button = $no_button;
        //$slide->bottom = $bottom;
        $slide->shadow = $shadow;
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

        $url = "settings";

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

        $no_button = ($request->input('no_button'))?1:0;
        //$bottom = ($request->input('bottom'))?1:0;
        $shadow = ($request->input('shadow'))?1:0;
        $no_title = ($request->input('no_title'))?1:0;

        $slide->subtitle = $request->input('subtitle');
        $slide->title = $request->input('title');
        $slide->no_title = $no_title;
        $slide->img = $request->input('img');
        $slide->img_mob = $request->input('img_mob');
        $slide->link_text = $request->input('link_text');
        $slide->link_url = $request->input('link_url');
        $slide->no_button = $no_button;
        //$slide->bottom = $bottom;
        $slide->shadow = $shadow;
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
