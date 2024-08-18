<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Menu};
use DB;
use Illuminate\Support\Str;

//use GuzzleHttp\Client;

class MenuController extends Controller
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
        $menus = Menu::where('status', 1)->where('parent_id', 0)->orderBy('sort', 'ASC')->get();
        $action = route('menu.store');
        $url = "settings";
        $form = 'new';

        return view('backend/menu/create', ['action' => $action, 'url' => $url, 'form' => $form, 'menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();

        $last_menu = Menu::where('status', 1)->orderBy('sort', 'desc')->max('sort');
        $sort = $last_menu + 1;

        if ($request->input('parent_id')) {
            $maxParent = Menu::find($request->input('parent_id'))->children()->max('sort');
            $sort = $maxParent + 1;
        }


        $menu->name = $request->input('name');
        $menu->slug = $request->input('slug');
        $menu->parent_id = $request->input('parent_id');
        $menu->sort = $sort;
        $menu->status = $request->input('status');
        $menu->save();

        return redirect('menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $menus = Menu::where('status', 1)->where('parent_id', 0)->orderBy('sort', 'ASC')->get();
        $action = route('menu.update', $id);
        $content = Menu::find($id);
        $put = True;
        $form = 'update';

        $url = "settings";

        return view('backend/menu/update', ['content' => $content, 'menus' => $menus, 'action' => $action, 'url' => $url, 'put' => $put, 'form' => $form]);
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

        // dd($request->input('parent_id'));
        $menu = Menu::find($id);
        if ($request->input('parent_id') !== "0" && $request->input('parent_id') !== $menu->parent_id) {
            $maxParent = Menu::find($request->input('parent_id'))->children()->max('sort');
            $sort = $maxParent + 1;
            $menu->sort = $sort;
        }

        $menu->name = $request->input('name');
        $menu->slug = $request->input('slug');
        $menu->status = $request->input('status');
        $menu->parent_id = $request->input('parent_id');
        $menu->save();

        return redirect('menu/' . $id . '/edit')->with('success', 'Successful update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if ($menu->children()->count() > 0) {
            foreach ($menu->children as $key => $child) {
                $menu_child = Menu::find($child->id);
                $menu_child->parent_id = 0;
                $menu_child->save();
            }
        }
        $menu->delete();

        return redirect('menu')->with('success', 'Menu deleted.');
    }

    public function sort()
    {
        $order = $_POST["order"];
        $order_array = json_decode($order, true);

        for ($i = 0; $i < count($order_array); $i++) {
            if (isset($order_array[$i]['children']) && count($order_array[$i]['children']) > 0) {
                foreach ($order_array[$i]['children'] as $indexChildren => $child) {
                    $menuChild = Menu::find($child['id']);
                    $menuChild->parent_id = $order_array[$i]['id'];
                    $menuChild->sort = $indexChildren;
                    $menuChild->save();
                }
            }
            $menu = Menu::find($order_array[$i]['id']);
            $menu->sort = $i;
            $menu->parent_id = 0;
            $menu->save();
        }

        return $order_array[1]['id'];

    }
}
