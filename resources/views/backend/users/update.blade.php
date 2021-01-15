@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <!-- Data picker -->
    <script src="{{asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

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
    </script>

@endsection


<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Update User</h5>
            <div class="ibox-tools">
  
            </div>
        </div>
        <div class="ibox-content">

            @include('backend.users._form')

        </div>
    </div>
</div>
</div>






@endsection


