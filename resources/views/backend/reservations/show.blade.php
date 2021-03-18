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
        <h2>Booking</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/booking">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Booking Detail</strong>
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
                <h5>Booking detail</h5>
                <div class="ibox-tools">
    
                </div>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Reservation Code</label>
                            <input type="text" name='code' class="form-control" value="{{$reservation->code}}" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>User Email</label>
                            <input type="text" name='user_email' class="form-control" value="{{$reservation->user_email}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>User</label>
                            <input type="text" name='user_name' class="form-control" value="{{$reservation->user_name}}" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Field</label>
                            <input type="text" name='field_name' class="form-control" value="{{$reservation->field_name}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Date</label>
                            <input type="text" name='date' class="form-control" value="{{$reservation->res_date}}" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Hour</label>
                            <input type="text" name='hour' class="form-control" value="{{$reservation->hour}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Price</label>
                            <input type="text" name='price' class="form-control" value="{{$reservation->price}}" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Registration date</label>
                            <input type="text" name='created_at' class="form-control" value="{{$reservation->created_at}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>

                <div class="form-group ">
                    <label>Paypal Code</label>
                    <input type="text" name='conf_code' class="form-control" value="{{$reservation->res_code}}" disabled>
                </div>

                <div class="form-group ">
                    <label>Note</label>
                    <input type="text" name='note' class="form-control" value="{{$reservation->note}}" disabled>
                </div>

                <div class="hr-line-dashed"></div>

                <a href="/booking" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>


                
            </div>
        </div>
    </div>
    </div>
</div>






@endsection


