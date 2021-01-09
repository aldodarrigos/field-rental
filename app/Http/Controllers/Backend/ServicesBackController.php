<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Service};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class ServicesBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Service::orderBy('sort', 'ASC')->get();
        $url = "services";
        return view('backend/services/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('backend-services.store');
        $url = "services";
        $form = 'new';

        return view('backend/services/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();

        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');
        $service->name = $name;
        $service->slug = $slug_input;
        $service->sumary = $request->input('sumary');
        $service->content = $request->input('content');
        $service->img = $request->input('img');
        $service->img_md = $request->input('img_md');
        $service->flag = $request->input('flag');
        $service->status = $request->input('status');
        $service->save();

        return redirect('backend-services');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('backend-services.update', $id);
        $content = Service::find($id);
        $put = True;
        $form = 'update';

        $url = "services";

        return view('backend/services/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $service = Service::find($id);


        $name = $request->input('name');
        $slug_input = Str::of($name)->slug('-');
        $service->name = $name;
        $service->slug = $slug_input;
        $service->sumary = $request->input('sumary');
        $service->content = $request->input('content');
        $service->img = $request->input('img');
        $service->img_md = $request->input('img_md');
        $service->flag = $request->input('flag');
        $service->status = $request->input('status');
        $service->save();

        return redirect('backend-services/'.$id.'/edit');

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

    public function show()
    {
        $records = Service::where('status', 1)->orderBy('sort', 'ASC')->get();
        $url = "services";
        return view('backend/services/sort', ['records' => $records, 'url' => $url]);
    }

    public function sort()
    {
        $order = $_POST["order"];
        $order_array = json_decode($order, true);


        for ($i=0; $i < count($order_array); $i++) { 
            $service = Service::find($order_array[$i]['id']);
            $service->sort = $i;
            $service->save();
        }

        return $order_array[1]['id'];



    }


}
