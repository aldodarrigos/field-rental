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
        <h2>Competitions</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/competitions">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Message detail</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Message detail</h5>
                <div class="ibox-tools">
    
                </div>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label>Competition</label>
                            <input type="text" name='fullname' class="form-control" value="{{$content->competition_name}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Fullname</label>
                            <input type="text" name='fullname' class="form-control" value="{{$content->fullname}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Email</label>
                            <input type="text" name='email' class="form-control" value="{{$content->email}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Phone</label>
                            <input type="text" name='phone' class="form-control" value="{{$content->phone}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Team</label>
                            <input type="text" name='team' class="form-control" value="{{$content->team}}" >
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Player number</label>
                            <input type="text" name='player_number' class="form-control" value="{{$content->number_players}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Category</label>
                            <input type="text" name='cat_name' class="form-control" value="{{$content->cat_name}}">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Gender</label>
                            @php
                                $gender = ($content->gender == 1)?'Female':'Male';
                            @endphp
                            <input type="text" name='player_number' class="form-control" value="{{$gender}}">
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                

                <div class="form-group tooltip-wrap">
                    <label>Message</label>
                    <textarea name="message" class="form-control" rows="12">{{$content->message}}</textarea>
                </div>

                <div class="hr-line-dashed"></div>
                
                <a href="/competition-registrations/{{$content->competition_id}}" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
                
            </div>
        </div>
    </div>
    </div>
</div>

@endsection



