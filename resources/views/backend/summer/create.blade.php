@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <script src="{{asset('inspinia/js/plugins/summernote/summernote-bs4.js')}}"></script>

    <script>
        $(document).ready(function () {

            $('.summernote').summernote({
                height: 300
            });
        });
    </script>

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Soccer Clinics</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/summerclin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>New Event</strong>
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
                <h5>New Event</h5>
                <div class="ibox-tools">
    
                </div>
            </div>
            <div class="ibox-content">

                @include('backend.summer._form')
                
            </div>
        </div>
    </div>
    </div>
</div>

@endsection


