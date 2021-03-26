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
        <h2>Services registration</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/bservices-registration">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Registration detail</strong>
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
                <h5>Registration detail</h5>
                <div class="ibox-tools">
    
                </div>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Service</label>
                            <input type="text" name='fullname' class="form-control" value="{{$record->service}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        @php
                            $status = ($record->status == 1)?'Paid':'Pending';
                        @endphp
                        <div class="form-group ">
                            <label>Status</label>
                            <input type="text" class="form-control" value="{{$status}}">
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Registrant</label>
                            <input type="text" name='fullname' class="form-control" value="{{$record->reg_user}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Email</label>
                            <input type="text" name='email' class="form-control" value="{{$record->email}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Phone</label>
                            <input type="text" name='phone' class="form-control" value="{{$record->phone}}">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Address</label>
                            <input type="text" name='fullname' class="form-control" value="{{$record->address}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>City</label>
                            <input type="text" name='email' class="form-control" value="{{$record->city}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Zip</label>
                            <input type="text" name='phone' class="form-control" value="{{$record->zip}}">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Phone Home</label>
                            <input type="text" name='fullname' class="form-control" value="{{$record->phone_home}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Phone Cell</label>
                            <input type="text" name='fullname' class="form-control" value="{{$record->phone_cell}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Emergency Contact</label>
                            <input type="text" name='email' class="form-control" value="{{$record->emergency_contact}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Emergency Phone</label>
                            <input type="text" name='phone' class="form-control" value="{{$record->emergency_phone}}">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-2">
                        <div class="form-group ">
                            <label>Amount paid </label>
                            <input type="text" name='team' class="form-control" value="{{'$'.$record->price}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Registration date </label>
                            <input type="text" name='team' class="form-control" value="{{date('M d, Y h:i:s A', strtotime($record->date) )}}" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Payment Code</label>
                            <input type="text" name='player_number' class="form-control" value="{{$record->payment_code}}">
                        </div>
                    </div>
                </div>
            

                <div class="hr-line-dashed"></div>

                <table class="table  table-bordered dataTables-example" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Tshirt</th>
                            <th>Obs</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($players as $player)

                            @php
                                $gender = ($player->gender == 1)?'Female':'Male';  
                            @endphp

                            <tr class="gradeX">
                                <td>{{$player->name}}</td>
                                <td><strong>{{$player->age}}</strong></td>
                                <td><strong>{{$gender}}</strong></td>
                                <td><strong>{{$player->tshirt_size}}</strong></td>
                                <td>{{$player->obs}}</td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

                <div class="hr-line-dashed"></div>
                
                <a href="/bservices-registration" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
                
            </div>
        </div>
    </div>
    </div>
</div>

@endsection



