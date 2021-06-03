@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                "order": [[ 0, "desc" ]],
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{$event->name}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/summerclin">Dashboard</a>
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
                    <h5>{{$event->name}} registration</h5>
                    <div class="ibox-tools">
                        
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Player</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Tshirt</th>
                                    <th>Registrant</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Detail</th>
                                    <th>Read</th>
                                </tr>
                            </thead>
                            <tbody>
             

                                @foreach ($records as $record)

                                    @php
                                        $gender = ($record->player_gender == 1)?'Female':'Male';
                                        $read = ($record->read == 1)?'default':'info';
                                        $read_txt = ($record->read == 1)?'Read':'Unread';
                                        $registration_status = ($record->status_registration ==1)?"<span class='text-info'>Paid</span>":"<span class='text-danger'>Unpaid</span>";
                                    @endphp

                                    <tr class="gradeX">
                                        <td><a href="/summerclin-registration-detail/{{$record->registration_id}}">{{$record->player_id}}</a></td>
                                        <td><a href="/summerclin-registration-detail/{{$record->registration_id}}">{{$record->player_name}}</a></td>
                                        <td>{{$record->player_age}}</td>
                                        <td>{{$gender}}</td>
                                        <td>{{$record->player_tshirt}}</td>
                                        <td>{{$record->user_name}}</td>
                                        <td>{{$record->event_name}}</td>
                                        <td><strong>{{date('M d, Y', strtotime($record->player_date))}}</strong></td>
                                        <td>{!!$registration_status!!}</td>
                                        <td><span class="btn btn-{{$read}} btn-xs">{{$read_txt}}</span></td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection


