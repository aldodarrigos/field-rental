@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <!-- SUMMERNOTE -->
    <script src="{{asset('inspinia/js/plugins/summernote/summernote-bs4.js')}}"></script>

    <!-- Data picker -->
    <script src="{{asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote({
                height: 300
            });


            var mem = $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

        });
    </script>

@endsection


<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Update Post</h5>
            <div class="ibox-tools">
  
            </div>
        </div>
        <div class="ibox-content">

            @include('backend.news._form')

        </div>
    </div>
</div>
</div>






@endsection


