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
                "order": [[ 12, "DESC" ]],
                "columnDefs": [
                    {
                        "targets": [ 12 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 11 ],
                        "searchable": false,
                        "sortable": false
                    },
                    {
                        "targets": [ 9 ],
                        "searchable": true,
                        "sortable": false
                    }
                ],
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
        <h2>Services Registration</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/backend-services">Services</a>
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
                    <h5>Services Registration</h5>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Player Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Tshirt Size</th>
                                    <th>Grade</th>
                                    <th>Obs</th>
                                    <th>Service</th>
                                    <th>Reg User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Read</th>
                                    <th>HideDate</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($records as $record)

                                    @php

                                    $status = 'Pending';
                                    $status_color = 'default';
                                    if($record->status == 1) {
                                        $status = 'Paid';
                                        $status_color = 'info';
                                    }

                                    $gender = ($record->gender == 1)?'Female':'Male';
                                    $read = ($record->read == 1)?'default':'info';
                                    $read_txt = ($record->read == 1)?'Read':'Unread';

                                    @endphp

                                    <tr class="gradeX">
                                        <td><a href="/serv-registration-detail/{{$record->registration_id}}">{{$record->player_id}}</a></td>
                                        
                                        <td><a href="/serv-registration-detail/{{$record->registration_id}}">{{$record->player_name}}</a></td>
                                        <td>{{$record->age}}</td>
                                        <td>{{$gender}}</td>
                                        <td>{{$record->tshirt_size}}</td>
                                        <td>{{$record->grade}}</td>
                                        <td>{{$record->obs}}</td>
                                        <td>{{$record->service_name}}</td>
                                        <td>{{$record->reg_user}}</td>
                                        <td>{{date('M d, Y', strtotime($record->updated_at))}}</td>
                                        <td class="center"><span class="btn btn-{{$status_color}} btn-xs">{{$status}}</span></td>
                                        <td><span class="btn btn-{{$read}} btn-xs">{{$read_txt}}</span></td>
                                        <td>{{date('Y-m-d', strtotime($record->updated_at))}}</td>
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


