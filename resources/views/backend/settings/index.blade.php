@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

@endsection


<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Update Settings</h5>
            <div class="ibox-tools">
  
            </div>
        </div>
        <div class="ibox-content">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            
            <form action="/settings/1" method="PUT"  id=''>
            
                @csrf
                <input type="hidden" name="_method" value="PUT">
            
                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group ">
                            <label >Site name</label>
                            <input type="text" name='site_name' class="form-control" value="{{$settings->site_name}}">
                        </div>

                        <div class="form-group ">
                            <label >Content</label>
                            <textarea name="sumary" class="form-control" rows="5">{{$settings->sumary}}</textarea>
                        </div>

                        <div class="form-group ">
                            <label >Logo</label>
                            <input type="text" name='logo' class="form-control" value="{{$settings->logo}}">
                        </div>

                        <div class="form-group ">
                            <label>Seo Image</label>
                            <input type="text" name='logo' class="form-control" value="{{$settings->img}}">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label >Email</label>
                                    <input type="text" name='email' class="form-control" value="{{$settings->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label >Open</label>
                                    <input type="text" name='open' class="form-control" value="{{$settings->open}}">
                                </div>
                            </div>
                        </div>

                    </div>
            
                    <div class="col-md-6">

                        <div class="form-group ">
                            <label>Location</label>
                            <input type="text" name='location' class="form-control" value="{{$settings->location}}">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Phone 1</label>
                                    <input type="text" name='phone_1' class="form-control" value="{{$settings->phone_1}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Phone 2</label>
                                    <input type="text" name='phone_2' class="form-control" value="{{$settings->phone_2}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Latitud</label>
                                    <input type="text" name='latitude' class="form-control" value="{{$settings->latitude}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Longitud</label>
                                    <input type="text" name='longitude' class="form-control" value="{{$settings->longitude}}">
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group ">
                            <label>Facebook</label>
                            <input type="text" name='facebook' class="form-control" value="{{$settings->facebook}}">
                        </div>
                    
                        <div class="form-group ">
                            <label>Instagram</label>
                            <input type="text" name='instagram' class="form-control" value="{{$settings->instagram}}">
                        </div>
                    
                        <div class="form-group ">
                            <label>Youtube</label>
                            <input type="text" name='youtube' class="form-control" value="{{$settings->youtube}}">
                        </div>
            
                        <div class="hr-line-dashed"></div>
            
                        <button type="submit" class="btn btn-w-m btn-success">Save</button>
                        

                    </div>
            
                </div>
            
            </form>

        </div>
    </div>
</div>
</div>






@endsection


