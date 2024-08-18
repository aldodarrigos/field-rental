@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent
    <script src="{{asset('inspinia/js/plugins/fullcalendar/moment.min.js')}}"></script>
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

        $(".show_card").click(function(){

            $('#myModal').modal('show'); 
            let res_id = $(this).data("id")
            $.ajax({
                url: "/get-reservation-detail/"+res_id,
                type: "GET",
                success: function(data){
                    $('#code').val(data[0]['code'])
                    $('#user_name').val(data[0]['user_name'])
                    $('#user_email').val(data[0]['user_email'])
                    $('#user_phone').val(data[0]['user_phone'])
                    $('#field_name').val(data[0]['field_name'])
                    $('#res_date').val(data[0]['res_date'])
                    $('#hour').val(data[0]['hour'])
                    $('#price').val('$'+data[0]['price'])
                    $('#reg_date').val(data[0]['updated_at'])
                    $('#paypal').val(data[0]['res_code'])
                    $('#client_name').val(data[0]['user_rel'])
                    $('#note').val(data[0]['note'])
                    $('#edit_link').attr("href", '/booking/'+data[0]['id']+'/edit');
                    
                }
            });

        });
    </script>

    <style>
        .capsule{
            background: #23c6c8;
            color: #fff;
            font-weight: bold;
            margin: 0;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .show_card{
            cursor: pointer;
        }
    </style>
@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Fields Calendar</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/booking">Dashboard</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content  animated fadeInRight">

    <div class="row justify-content-between mb-2">
        
        <div class="col-md-2 text-center text-md-left mb-2 mb-md-0">
            <form action="" class="">
                <input type="hidden" name="date" value="{{date("Y-m-d",strtotime($date."- 1 days"))}}">
                <button class="btn btn-success btn-sm"><i class="fas fa-angle-double-left"></i> Prev day</button>
            </form>
            
        </div>
        <div class="col-md-3 mb-2 mb-md-0">
            <form action="">
                <div class="d-flex flex-row-reverse">
                    <div class="">
                        <button type="submit" class="btn btn-md btn-success"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="mr-2">
                        <div class="input-group date float-right">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="date" value="{{$date}}"> 
                        </div>
                    </div>
                </div>   
            </form>    
            
        </div>
        <div class="col-md-2 text-center text-md-right">
            <form action="">
                <input type="hidden" name="date" value="{{date("Y-m-d",strtotime($date."+ 1 days"))}}">
                <button class="btn btn-success btn-sm"><i class="fas fa-angle-double-right"></i> Next day</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Fields Reservations (<strong>{{$date}}</strong>)</h5>
                    <div class="ibox-tools">
                        <a href="/calendar" class="btn btn-xs btn-success text-white" style='color: #fff!Important;'>Calendar <i class="far fa-calendar-alt"></i></a>

                        @if (Auth::user()->role == 2)
                            <a href="/booking/create" class="btn btn-primary btn-xs">New Booking</a>
                            <p>Estás conectado como {{ Auth::user()->name }}.</p>
                        @endif
                    </div>
                </div>
                <div class="ibox-content">
                    
                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Hour</th>
                                @foreach ($fields as $field)
                                    <th class="font-weight-bold">{{$field->number.'. '.$field->name}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">8 AM</td>
                                @for ($i = 0; $i < count($hour_8am); $i++)
                                    @if ($hour_8am[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_8am[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_8am[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_8am[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">9 AM</td>
                                @for ($i = 0; $i < count($hour_9am); $i++)
                                    @if ($hour_9am[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_9am[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_9am[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_9am[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">10 AM</td>
                                @for ($i = 0; $i < count($hour_10am); $i++)
                                    @if ($hour_10am[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_10am[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_10am[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_10am[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">11 AM</td>
                                @for ($i = 0; $i < count($hour_11am); $i++)
                                    @if ($hour_11am[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_11am[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_11am[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_11am[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">12 PM</td>
                                @for ($i = 0; $i < count($hour_12pm); $i++)
                                    @if ($hour_12pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_12pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_12pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_12pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">1 PM</td>
                                @for ($i = 0; $i < count($hour_1pm); $i++)
                                    @if ($hour_1pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_1pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_1pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_1pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">2 PM</td>
                                @for ($i = 0; $i < count($hour_2pm); $i++)
                                    @if ($hour_2pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_2pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_2pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_2pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">3 PM</td>
                                @for ($i = 0; $i < count($hour_3pm); $i++)
                                    @if ($hour_3pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_3pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_3pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_3pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">4 PM</td>
                                @for ($i = 0; $i < count($hour_4pm); $i++)
                                    @if ($hour_4pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <!--
                                                <a target='_blank' href="/booking/{{$hour_4pm[$i]['res_id']}}/edit">{{$hour_4pm[$i]['user']}}</a>
                                                -->
                                                <span class="show_card" data-id='{{$hour_4pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_4pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_4pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">5 PM</td>
                                @for ($i = 0; $i < count($hour_5pm); $i++)
                                    @if ($hour_5pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_5pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_5pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_5pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">6 PM</td>
                                @for ($i = 0; $i < count($hour_6pm); $i++)
                                    @if ($hour_6pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_6pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_6pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_6pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">7 PM</td>
                                @for ($i = 0; $i < count($hour_7pm); $i++)
                                    @if ($hour_7pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_7pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_7pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_7pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">8 PM</td>
                                @for ($i = 0; $i < count($hour_8pm); $i++)
                                    @if ($hour_8pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_8pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_8pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_8pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">9 PM</td>
                                @for ($i = 0; $i < count($hour_9pm); $i++)
                                    @if ($hour_9pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_9pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_9pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_9pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">10 PM</td>
                                @for ($i = 0; $i < count($hour_10pm); $i++)
                                    @if ($hour_10pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_10pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_10pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_10pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td class="font-weight-bold">11 PM</td>
                                @for ($i = 0; $i < count($hour_11pm); $i++)
                                    @if ($hour_11pm[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <span class="show_card" data-id='{{$hour_11pm[$i]['res_id']}}' data-toggle="modal" data-target="#myModal">{{$hour_11pm[$i]['user']}}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_11pm[$i]['user']}}</td>
                                    @endif
                                @endfor
                            </tr>
            
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>


    </div>

</div>

<div class="modal inmodal fade show" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Booking detail</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Reservation Code</label>
                            <input type="text" id="code" class="form-control" value="" disabled="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>User</label>
                            <input type="text" id="user_name" class="form-control" value="" disabled="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>User Email</label>
                            <input type="text" id="user_email" class="form-control" value="" disabled="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>User Phone</label>
                            <input type="text" id="user_phone" class="form-control" value="" disabled="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Field</label>
                            <input type="text" id="field_name" class="form-control" value="" disabled="">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Date</label>
                            <input type="text" id="res_date" class="form-control" value="" disabled="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Hour</label>
                            <input type="text" id="hour" class="form-control" value="" disabled="">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Price</label>
                            <input type="text" id="price" class="form-control" value="" disabled="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Registration date</label>
                            <input type="text" id="reg_date" class="form-control" value="" disabled="">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Paypal Code</label>
                            <input type="text" id="paypal" class="form-control" value="" disabled="">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>Client name</label>
                            <input type="text" id="client_name" class="form-control" value="" disabled="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label>Note</label>
                            <input type="text" id="note" class="form-control" value="" disabled="">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                @if (Auth::user()->role == 2)
                    <a id='edit_link' target='_blank' href='' type="button" class="btn btn-primary text-white">Edit reservation</a>
                @endif
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>



@endsection


