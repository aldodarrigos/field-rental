@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

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


