<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, CompetitionCategory};
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
        $records_sort = Category::where('status', 1)->orderBy('sort', 'ASC')->get();

        $url = "competitions";
        
        return view('backend/categories/index', ['records' => $records, 'url' => $url, 'records_sort' => $records_sort]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action = route('categories.store');
        $url = "competitions";
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

        $url = "competitions";

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

    public function get_categories($id_competition)
    {

        $categories = DB::table('competition_categories')
        ->select(DB::raw('competition_categories.id, competition_categories.category_id, categories.name'))
        ->leftJoin('categories', 'competition_categories.category_id', '=', 'categories.id')
        ->where('competition_categories.competition_id', $id_competition)
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

    public function get_categories_select($id_competition)
    {

        $categories_array = array();
        $competition_categories = CompetitionCategory::where('competition_id', $id_competition)->get();
        foreach ($competition_categories as $value) {
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

    public function get_categories_all()
    {

        $categories = Category::where('status', 1)->orderBy('name', 'desc')->get();
        
        $records = '<option value="0">-- SELECT --</option>';
        foreach($categories  as $item){
            $records .= '                        
            <option value="'.$item->id.'">'.$item->name.'</option>';
        }
        return $records;
        
    }

    public function sort()
    {
        $order = $_POST["order"];
        $order_array = json_decode($order, true);


        for ($i=0; $i < count($order_array); $i++) { 
            $category = Category::find($order_array[$i]['id']);
            $category->sort = $i;
            $category->save();
        }

        return $order_array[1]['id'];



    }

}
