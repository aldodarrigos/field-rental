@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <!-- Data picker -->
    <script src="{{asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

    <link href="{{asset('summernote-0.8.18/summernote.css')}}" rel="stylesheet">
    <script src="{{asset('summernote-0.8.18/summernote.js')}}"></script>
    
    <script>

        $(document).ready(function(){

            var mem = $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

        });

        $('#summernote').summernote({
          tabsize: 2,
          height: 500,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
    </script>

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>News</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/backend-news">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Update Post</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

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

</div>

@endsection


