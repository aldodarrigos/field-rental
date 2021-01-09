@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

@endsection


<div class="row">
    <div class="col-lg-6">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Update Content</h5>
            <div class="ibox-tools">
  
            </div>
        </div>
        <div class="ibox-content">

            @include('backend.content-groups._form')

        </div>
    </div>
</div>
</div>






@endsection


