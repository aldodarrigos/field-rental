<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Tournament_category};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class TournamentCatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Menu::orderBy('sort', 'ASC')->get();
        $records_active = Menu::where('status', 1)->orderBy('sort', 'ASC')->get();

        $url = "settings";
        
        return view('backend/menu/index', ['records' => $records, 'records_active' => $records_active, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('menu.store');
        $url = "settings";
        $form = 'new';

        return view('backend/menu/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new Tournament_category();

        $record->tournament_id = $request->input('tournament_id');
        $record->category_id = $request->input('category_id');
        $record->save();

        //return redirect('menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('menu.update', $id);
        $content = Menu::find($id);
        $put = True;
        $form = 'update';

        $url = "settings";

        return view('backend/menu/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $menu = Menu::find($id);

        $menu->name = $request->input('name');
        $menu->slug = $request->input('slug');
        $menu->status = $request->input('status');
        $menu->save();

        return redirect('menu/'.$id.'/edit')->with('success', 'Successful update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Tournament_category::find($id);
        $record->delete();

    }


}
