<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{File};
use DB;
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = File::orderBy('id', 'DESC')->limit(150)->get();
        $action = route('gallery.store');
        $url = "gallery";

        return view('backend/gallery/index',  ['files' => $files, 'url' => $url, 'action' => $action]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,webp|max:500',
        ]);

        $document = $request->file('file');

        $file = new File();
        $file->url = $document->getClientOriginalName();
        $file->save();



        $upload = $request->file('file')->storeAs('/files/', $document->getClientOriginalName(), 'public'); 

        return redirect('gallery')->with('success','Image uploaded.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = 0)
    {
        $file = File::find($id);

        Storage::delete('public/files/'.$file->url);
        //unlink(storage_path('storage/public/'.$file->url));
        $file->delete();

        return redirect('gallery')->with('success','Image deleted.');
        
    }
}
