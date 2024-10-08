@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Competitions</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/competitions">Dashboard</a>
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
        <div class="col-lg-12">
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
                            <label>Competition</label>
                            <input type="text" name='fullname' class="form-control" value="{{$record->competition_name}}">
                        </div>
                    </div>
     
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Registrant</label>
                            <input type="text" name='fullname' class="form-control" value="{{$record->registrant}}">
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

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Team Name </label>
                            <input type="text" name='team' class="form-control" value="{{$record->team_name}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        @php
                        $gender = ($record->gender == 1)?'Famele':'Male';  
                         @endphp

                        <div class="form-group ">
                            <label>Gender</label>
                            <input type="text" name='team' class="form-control" value="{{$gender}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Category</label>
                            <input type="text" name='team' class="form-control" value="{{$record->category}}" >
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Uniform Color</label>
                            <input type="text" name='uniform' class="form-control" value="{{$record->uniforms}}" >
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Amount </label>
                            <input type="text" name='team' class="form-control" value="{{'$'.$record->price}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Registration date </label>
                            <input type="text" name='team' class="form-control" value="{{date('m-d-Y', strtotime($record->date) )}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        @php
                            $status = ($record->registration_status == 0)?'Pending payment':'Paid';
                        @endphp
                        <div class="form-group ">
                            <label>Status</label>
                            <input type="text" name='player_number' class="form-control" value="{{$status}}">
                        </div>
                    </div>
                    
                </div>
               
                <div class="row">

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
                            <th>T-Shirt</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($players as $player)

                            <tr class="gradeX">
                                <td>{{$player->name}}</td>
                                <td><strong>{{$player->age}}</strong></td>
                                <td><strong>{{$player->tshirt}}</strong></td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

                <div class="hr-line-dashed"></div>
                
                <a href="/team-competition-registration/{{$record->competition_id}}" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
                
            </div>
        </div>
    </div>
    </div>
</div>

@endsection



