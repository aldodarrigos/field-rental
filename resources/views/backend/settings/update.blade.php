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
            
            <form action="{{$action}}" method="POST"  id=''>
            
                @csrf
                <input type="hidden" name="_method" value="PUT">
            
                <div class="row">

                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group ">
                                    <label >Site name</label>
                                    <input type="text" name='site_name' class="form-control" value="{{$settings->site_name}}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label >Email</label>
                                    <input type="text" name='email' class="form-control" value="{{$settings->email}}" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label >Content</label>
                            <textarea name="sumary" class="form-control" rows="5">{{$settings->sumary}}</textarea>
                        </div>

                        <div class="form-group tooltip-wrap">
                            <label >
                                Fav Icon 
                                <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dimension: 255px - 155px"></i>
                            </label>
                            <input type="text" name='icon' class="form-control" value="{{$settings->icon}}" autocomplete="off">
                        </div>

                        <div class="form-group tooltip-wrap">
                            <label >
                                Logo Black
                                <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dimension: 255px - 155px"></i>
                            </label>
                            <input type="text" name='logo' class="form-control" value="{{$settings->logo}}" autocomplete="off">
                        </div>

                        <div class="form-group tooltip-wrap">
                            <label >
                                Logo White 
                                <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dimension: 255px - 155px"></i>
                            </label>
                            <input type="text" name='logo_white' class="form-control" value="{{$settings->logo_white}}" autocomplete="off">
                        </div>

                        <div class="form-group ">
                            <label>Seo Image</label>
                            <input type="text" name='img' class="form-control" value="{{$settings->img}}" autocomplete="off">
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Fields rental time</label>
                                    <input type="text" name='open' class="form-control" value="{{$settings->open}}" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Admin time</label>
                                    <input type="text" name='open_admin' class="form-control" value="{{$settings->open_admin}}" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">

                                    <label for='group'>Season</label>
                                    <select class="form-control m-b" name="season">
                                        @if ($settings->season == 1)
                                            <option value='1' selected>Summer</option>
                                            <option value='2'>Winter</option>
                                        @else
                                            <option value='1'>Summer</option>
                                            <option value='2' selected>Winter</option>
                                        @endif
                    
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
            
                    <div class="col-md-6">

                        <div class="form-group ">
                            <label>Location</label>
                            <input type="text" name='location' class="form-control" value="{{$settings->location}}" autocomplete="off">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Phone 1</label>
                                    <input type="text" name='phone_1' class="form-control" value="{{$settings->phone_1}}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Phone 2</label>
                                    <input type="text" name='phone_2' class="form-control" value="{{$settings->phone_2}}" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Latitud</label>
                                    <input type="text" name='latitude' class="form-control" value="{{$settings->latitude}}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Longitud</label>
                                    <input type="text" name='longitude' class="form-control" value="{{$settings->longitude}}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group ">
                            <label>Facebook</label>
                            <input type="text" name='facebook' class="form-control" value="{{$settings->facebook}}" autocomplete="off">
                        </div>
                    
                        <div class="form-group ">
                            <label>Instagram</label>
                            <input type="text" name='instagram' class="form-control" value="{{$settings->instagram}}" autocomplete="off">
                        </div>
                    
                        <div class="form-group ">
                            <label>Youtube</label>
                            <input type="text" name='youtube' class="form-control" value="{{$settings->youtube}}" autocomplete="off">
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


