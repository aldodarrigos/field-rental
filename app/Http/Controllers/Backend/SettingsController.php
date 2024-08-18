<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Setting};
use DB;
use Illuminate\Support\Str;
//use GuzzleHttp\Client;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id = 1)
    {
        $settings = Setting::first();
        $action = route('settings.update', $id);
        $url = "settings";

        return view('backend/settings/index', ['settings' => $settings, 'url' => $url, 'action' => $action]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $groups = Setting::where('status', 1)->get();
        $action = route('content-groups.store');
        $url = "content";
        $form = 'new';

        return view('backend/settings/create', ['action' => $action, 'url' => $url, 'groups' => $groups, 'form' => $form]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = new Setting();

        $setting->site_name = $request->input('site_name');
        $setting->sumary = $request->input('sumary');
        $setting->logo = $request->input('logo');
        $setting->img = $request->input('img');
        $setting->facebook = $request->input('facebook');
        $setting->instagram = $request->input('instagram');
        $setting->youtube = $request->input('youtube');
        $setting->location = $request->input('location');
        $setting->open = $request->input('open');
        $setting->open_admin = $request->input('open_admin');
        $setting->email = $request->input('email');
        $setting->phone_1 = $request->input('phone_1');
        $setting->phone_2 = $request->input('phone_2');
        $setting->latitude = $request->input('latitude');
        $setting->longitude = $request->input('longitude');
        $setting->save();

        return redirect('settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $action = route('settings.update', $id);
        $settings = Setting::find($id);
        $put = True;
        $form = 'update';

        $url = "settings";

        return view('backend/settings/update', ['settings' => $settings, 'action' => $action, 'url' => $url, 'put' => $put, 'form' => $form]);
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

        $setting = Setting::find($id);

        $setting->site_name = $request->input('site_name');
        $setting->sumary = $request->input('sumary');
        $setting->logo = $request->input('logo');
        $setting->logo_white = $request->input('logo_white');
        $setting->icon = $request->input('icon');
        $setting->img = $request->input('img');
        $setting->facebook = $request->input('facebook');
        $setting->instagram = $request->input('instagram');
        $setting->youtube = $request->input('youtube');
        $setting->location = $request->input('location');
        $setting->open = $request->input('open');
        $setting->open_admin = $request->input('open_admin');
        $setting->season = $request->input('season');
        $setting->email = $request->input('email');
        $setting->phone_1 = $request->input('phone_1');
        $setting->phone_2 = $request->input('phone_2');
        $setting->latitude = $request->input('latitude');
        $setting->longitude = $request->input('longitude');
        $setting->save();

        return redirect('settings/' . $id . '/edit')->with('success', 'Successful update!');

    }

    public function update_waiver(Request $request)
    {

        $setting = Setting::find(1);

        $setting->waiver = $request->input('waiver');

        $setting->save();

        return redirect('waiver')->with('success', 'Successful update!');

    }

    public function waiver()
    {

        $action = route('settings.update', 1);
        $settings = Setting::find(1);
        $put = True;
        $form = 'update';
        $url = "settings";

        return view('backend/settings/waiver', ['settings' => $settings, 'action' => $action, 'url' => $url, 'put' => $put]);
    }

    public function field_rules()
    {

        $action = route('settings.update', 1);
        $settings = Setting::find(1);
        $put = True;
        $form = 'update';
        $url = "settings";

        return view('backend/settings/field_rules', ['settings' => $settings, 'action' => $action, 'url' => $url, 'put' => $put]);
    }


    public function update_field_rules(Request $request)
    {

        $setting = Setting::find(1);

        $setting->field_rules = $request->input('field_rules');

        $setting->save();

        return redirect('field-rules')->with('success', 'Successful update!');

    }


}
