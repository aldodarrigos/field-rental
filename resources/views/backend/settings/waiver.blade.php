@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent
    <!-- SUMMERNOTE -->
    <link href="{{asset('inspinia/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <script src="{{asset('inspinia/js/plugins/summernote/summernote-bs4.js')}}"></script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote({
                height: 600
            });
            
        });
    </script>


@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Weiver</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/settings">Settings</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-8">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Update Weiver</h5>
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
                
                <form action="/update-waiver" method="POST"  id=''>
                
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group ">
                                <label >Content</label>
                                <textarea name="waiver" class="form-control summernote" rows="30">{{$settings->waiver}}</textarea>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <input type="hidden" name="_method" value="PUT">
                
                            <button type="submit" class="btn btn-w-m btn-success">Save</button>

                        </div>
                
                
                    </div>
                
                </form>

            </div>
        </div>
    </div>
    </div>
</div>






@endsection


