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
        <h2>Registration Service</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/backend-services">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Reservation Detail</strong>
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
                <h5>Reservation detail</h5>
                <div class="ibox-tools">
    
                </div>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Paypal Code</label>
                            <input type="text" name='' class="form-control" value="{{$record->payment_code}}" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>User registration</label>
                            <input type="text" name='' class="form-control" value="{{$record->reg_user}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>User registration email</label>
                            <input type="text" name='' class="form-control" value="{{$record->email}}" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Player Name</label>
                            <input type="text" name='' class="form-control" value="{{$record->player_name}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>DOB</label>
                            <input type="text" name='' class="form-control" value="{{$record->dob}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Gender</label>
                            <input type="text" name='' class="form-control" value="{{$record->gender}}" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Address</label>
                            <input type="text" name='' class="form-control" value="{{$record->address}}" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>City</label>
                            <input type="text" name='' class="form-control" value="{{$record->city}}" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Zip</label>
                            <input type="text" name='' class="form-control" value="{{$record->zip}}" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Grade</label>
                            <input type="text" name='' class="form-control" value="{{$record->grade}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Tee shirt size</label>
                            <input type="text" name='' class="form-control" value="{{$record->tshirt_size}}" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Emergency Contact</label>
                            <input type="text" name='' class="form-control" value="{{$record->emergency_contact}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Emergency Phone</label>
                            <input type="text" name='' class="form-control" value="{{$record->emergency_phone}}" >
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <label>KNOWN ALLERGIES OR OTHER PERTINENT MEDICAL INFORMATION</label>
                    <input type="text" name='' class="form-control" value="{{$record->obs}}" >
                </div>


                <a href="/bservices-registration" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>


                
            </div>
        </div>
    </div>
    </div>
</div>






@endsection


