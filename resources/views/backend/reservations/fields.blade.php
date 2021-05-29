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
    </script>

    <style>
        .capsule{
            background: #FAFAFB;
            border: 1px solid #e7eaec;
            margin: 0;
            padding: 5px 10px;
            border-radius: 2px;
            border-left: 3px solid #1c84c6;
        }
    </style>
@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Fields Calendar {{$date}}</h2>
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

    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Reservations</h5>
                    <div class="ibox-tools">
                        <a href="/calendar" class="btn btn-xs btn-success text-white" style='color: #fff!Important;'>Calendar <i class="far fa-calendar-alt"></i></a>

                        <a href="/booking/create" class="btn btn-primary btn-xs">New Booking</a>
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
                                <td class="font-weight-bold">9 AM</td>
                                @for ($i = 0; $i < count($hour_9am); $i++)
                                    @if ($hour_9am[$i]['res_id']!='000')
                                        <td>
                                            <div class="capsule">
                                                <a class="" target='_blank' href="/booking/{{$hour_9am[$i]['res_id']}}/edit">{{$hour_9am[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_10am[$i]['res_id']}}/edit">{{$hour_10am[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_11am[$i]['res_id']}}/edit">{{$hour_11am[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_12pm[$i]['res_id']}}/edit">{{$hour_12pm[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_1pm[$i]['res_id']}}/edit">{{$hour_1pm[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_2pm[$i]['res_id']}}/edit">{{$hour_2pm[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_3pm[$i]['res_id']}}/edit">{{$hour_3pm[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_4pm[$i]['res_id']}}/edit">{{$hour_4pm[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_5pm[$i]['res_id']}}/edit">{{$hour_5pm[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_6pm[$i]['res_id']}}/edit">{{$hour_6pm[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_7pm[$i]['res_id']}}/edit">{{$hour_7pm[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_8pm[$i]['res_id']}}/edit">{{$hour_8pm[$i]['user']}}</a>
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
                                                <a target='_blank' href="/booking/{{$hour_9pm[$i]['res_id']}}/edit">{{$hour_9pm[$i]['user']}}</a>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{$hour_9pm[$i]['user']}}</td>
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





@endsection


