<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, Tournament_category};
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

    public function get_categories($id_tournament)
    {

        $categories = DB::table('tournament_categories')
        ->select(DB::raw('tournament_categories.id, tournament_categories.category_id, categories.name'))
        ->leftJoin('categories', 'tournament_categories.category_id', '=', 'categories.id')
        ->where('tournament_categories.tournament_id', $id_tournament)
        ->orderBy('categories.name', 'asc')
        ->get();
        
        $records = '';
        foreach($categories  as $item){
            $records .= '                        
            <tr>
                <td class="">'.$item->name.'</td>
                <td class="text-center"><a class="text-danger delete" data-id="'.$item->id.'">delete</a></td>
            </tr>';
        }
        return $records;
        
    }

    public function get_categories_select($id_tournament)
    {

        $categories_array = array();
        $tournament_categories = Tournament_category::where('tournament_id', $id_tournament)->get();
        foreach ($tournament_categories as $value) {
            array_push($categories_array, $value->category_id);
        }
        $categories = Category::where('status', 1)->whereNotIn('id', $categories_array)->orderBy('name', 'desc')->get();
        
        $records = '<option value="0">-- SELECT --</option>';
        foreach($categories  as $item){
            $records .= '                        
            <option value="'.$item->id.'">'.$item->name.'</option>';
        }
        return $records;
        
    }
}
