<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{User};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $records = DB::table('content')
        ->select(DB::raw('content.id, content.title, content.shortcut, content.subtitle, content.link, content.flag, content.status as content_status, content_groups.name as group_name, content.updated_at'))
        ->leftJoin('content_groups', 'content.group_id', '=', 'content_groups.id')
        ->orderBy('content.updated_at', 'desc')
        ->get();
        */
        $records = User::all();

        $url = "users";
        
        return view('backend/users/index', ['records' => $records, 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('users.store');
        $url = "users";
        $form = 'new';

        return view('backend/users/create', ['action' => $action, 'url' => $url, 'form' => $form]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $password = Hash::make($request->input('password')) ;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $password;
        $user->role = $request->input('role');
        $user->ide = $request->input('ide');
        
        $user->born = $request->input('born');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        $user->member = $request->input('member');
        $user->member_start = $request->input('member_start');
        $user->member_finish = $request->input('member_finish');
        $user->status = $request->input('status');
        $user->save();

        return redirect('users')->with('success', 'Successful create!');
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $action = route('users.update', $id);
        $content = User::find($id);
        $put = True;
        $form = 'update';

        $url = "users";

        return view('backend/users/update', ['content' => $content, 'action' => $action, 'url' => $url, 'put' => $put,  'form' => $form]);
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

        $user = User::find($id);

        $password = $request->input('passfrase');

        if($password != null){

            $user->name = $request->input('nome');
            $user->email = $request->input('mailtext');
            $user->password = Hash::make($password);
            $user->role = $request->input('role');
            $user->ide = $request->input('ide');
            $user->born = $request->input('born');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');
            $user->member = $request->input('member');
            $user->member_start = $request->input('member_start');
            $user->member_finish = $request->input('member_finish');
            $user->status = $request->input('status');
            $user->save();

        }else{

            $user->name = $request->input('nome');
            $user->email = $request->input('mailtext');
            $user->role = $request->input('role');
            $user->ide = $request->input('ide');
            $user->born = $request->input('born');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');
            $user->member = $request->input('member');
            $user->member_start = $request->input('member_start');
            $user->member_finish = $request->input('member_finish');
            $user->status = $request->input('status');
            $user->save();

        }



        return redirect('users/'.$id.'/edit')->with('success', 'Successful update!');

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
