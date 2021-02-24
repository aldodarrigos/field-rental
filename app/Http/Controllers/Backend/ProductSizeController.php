<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ProductSize, Size};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class ProductSizeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new ProductSize();

        $record->product_id = $request->input('product_id');
        $record->size_id = $request->input('size_id');
        $record->save();

        //return redirect('menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = ProductSize::find($id);
        $record->delete();

    }

    public function get_sizes($product_id)
    {

        $sizes = DB::table('product_sizes')
        ->select(DB::raw('product_sizes.id, product_sizes.product_id, sizes.name'))
        ->leftJoin('sizes', 'product_sizes.size_id', '=', 'sizes.id')
        ->where('product_sizes.product_id', $product_id)
        ->orderBy('sizes.name', 'asc')
        ->get();
        
        $records = '';
        foreach($sizes  as $item){
            $records .= '                        
            <tr>
                <td class="">'.$item->name.'</td>
                <td class="text-center"><a class="text-danger delete" data-id="'.$item->id.'">delete</a></td>
            </tr>';
        }
        return $records;
        
    }

    public function get_sizes_select($product_id)
    {

        $sizes_array = array();
        $product_sizes = ProductSize::where('product_id', $product_id)->get();
        
        foreach ($product_sizes as $value) {
            array_push($sizes_array, $value->size_id);
        }
        $sizes = Size::where('status', 1)->whereNotIn('id', $sizes_array)->orderBy('sort', 'asc')->get();
        
        $records = '<option value="0">-- SELECT --</option>';
        foreach($sizes  as $item){
            $records .= '                        
            <option value="'.$item->id.'">'.$item->name.'</option>';
        }
        return $records;
        
    }

}
