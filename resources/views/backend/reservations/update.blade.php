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
                <a href="/backend-booking">Dashboard</a>
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
                    <div class="ibox-tools"></div>
                </div>

                <div class="ibox-content">

                    <form action="{{$action}}" method="POST"  id=''>

                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Reservation Code</label>
                                    <input type="text" name='code' class="form-control" value="{{$reservation->code}}" disabled>
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
                                    <label>User Email</label>
                                    <input type="text" name='user_email' class="form-control" value="{{$reservation->user_email}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>User Phone</label>
                                    <input type="text" name='user_phone' class="form-control" value="{{$reservation->user_phone}}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for='group'>Status</label>
                                    <select class="form-control m-b" name="field_id">
                                        @foreach ($fields as $field)
                                            @php
                                                $selected = ($field->id == $reservation->field_id)?'selected':'';
                                            @endphp
                                            <option value='{{$field->id}}' {{$selected}}>{{$field->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Date <small>(Y-m-d)</small></label>
                                    <input type="text" name='date' class="form-control" value="{{$reservation->res_date}}" >
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            @php
                                $hoursArray = [
                                    ['hour' => '09:00', 'alt' => '9 AM'],
                                    ['hour' => '10:00', 'alt' => '10 AM'],
                                    ['hour' => '11:00', 'alt' => '11 AM'],
                                    ['hour' => '12:00', 'alt' => '12 PM'],
                                    ['hour' => '13:00', 'alt' => '1 PM'],
                                    ['hour' => '14:00', 'alt' => '2 PM'],
                                    ['hour' => '15:00', 'alt' => '3 PM'],
                                    ['hour' => '16:00', 'alt' => '4 PM'],
                                    ['hour' => '17:00', 'alt' => '5 PM'],
                                    ['hour' => '18:00', 'alt' => '6 PM'],
                                    ['hour' => '19:00', 'alt' => '7 PM'],
                                    ['hour' => '20:00', 'alt' => '8 PM'],
                                    ['hour' => '21:00', 'alt' => '9 PM'],
                                ];

                                /*
                                for ($i=0; $i < count($hoursArray) ; $i++) { 
                                    echo $hoursArray[$i]['alt']."<br>";
                                }
                                */
                 
                            @endphp

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for='group'>Hour</label>
                                    <select class="form-control m-b" name="hour">
                                        @for ($i = 0; $i < count($hoursArray); $i++)
                                            @php
                                                $selected = ($hoursArray[$i]['hour'] == $reservation->hour)?'selected':'';
                                            @endphp
                                            <option value='{{$hoursArray[$i]['hour']}}' {{$selected}}>{{$hoursArray[$i]['alt']}}</option>
                                        @endfor

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Price</label>
                                    <input type="text" name='price' class="form-control" value="{{$reservation->price}}" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Registration date</label>
                                    <input type="text" name='created_at' class="form-control" value="{{$reservation->updated_at}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Paypal Code</label>
                                    <input type="text" name='conf_code' class="form-control" value="{{$reservation->res_code}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Client name</label>
                                    <input type="text" name='user_rel' class="form-control" value="{{$reservation->user_rel}}">
                                </div>
                            </div>
                        </div>
        
                        <div class="form-group ">
                            <label>Note</label>
                            <input type="text" name='note' class="form-control" value="{{$reservation->note}}" >
                        </div>
        
                        <div class="hr-line-dashed"></div>

                        <div class="row">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-w-m btn-success"><i class="fas fa-download"></i> Update</button>
                                <input type="hidden" name="_method" value="PUT">
        
                                <a href="/booking" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
                            </div>
                            <div class="col-md-3">
                                <a href="" class="btn btn-w-m btn-danger float-right" data-toggle="modal" data-target="#myModal6"><i class="far fa-trash-alt"></i> Delete</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="far fa-trash-alt"></i> Delete</h4>
            </div>
            <div class="modal-body">
                <p><strong>
                    Are you sure you want to delete this record?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <a href="/delete-reservation/{{$reservation->id}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>




@endsection


