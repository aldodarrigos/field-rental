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
                "order": [[ 6, "DESC" ]],
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
                                    <th>Reg User</th>
                                    <th>Player Name</th>
                                    <th>City</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                    <th>Date</th>
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

                                    @endphp

                                    <tr class="gradeX">
                                        <td><a href="/serv-registration-detail/{{$record->registration_id}}">{{$record->registration_id}}</a></td>
                                        <td><a href="/serv-registration-detail/{{$record->registration_id}}">{{$record->reg_user}}</a></td>
                                        <td>{{$record->player_name}}</td>
                                        <td>{{$record->city}}</td>
                                        <td>{{$record->service}}</td>
                                        <td class="center"><span class="btn btn-{{$status_color}} btn-xs">{{$status}}</span></td>
                                        <td>{{date('m-d-Y', strtotime($record->updated_at))}}</td>
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


