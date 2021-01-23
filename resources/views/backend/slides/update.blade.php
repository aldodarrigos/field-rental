@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">

    <script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>SlideShow</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/slides">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Update Slide</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="ibox ">
        <div class="ibox-title">
            <h5>Update Slide</h5>
            <div class="ibox-tools">

            </div>
        </div>
        <div class="ibox-content">

            @include('backend.slides._form')

        </div>
    </div>

</div>






@endsection


