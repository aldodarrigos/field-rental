@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">

    <!-- SUMMERNOTE -->
    <script src="{{asset('inspinia/js/plugins/summernote/summernote-bs4.js')}}"></script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote('content');

        });
    </script>

@endsection


<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Update Service</h5>
            <div class="ibox-tools">
  
            </div>
        </div>
        <div class="ibox-content">

            @include('backend.services._form')

        </div>
    </div>
</div>
</div>






@endsection


