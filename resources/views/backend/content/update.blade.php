@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Content</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/content">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Update Content</strong>
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
                    <h5>Update Content</h5>
                    <div class="ibox-tools">
        
                    </div>
                </div>
                <div class="ibox-content">

                    @include('backend.content._form')

                </div>
            </div>
        </div>
    </div>

</div>


@endsection


