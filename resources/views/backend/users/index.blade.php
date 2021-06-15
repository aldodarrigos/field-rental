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
        <h2>Users</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/users">Dashboard</a>
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
                    <h5>Content</h5>
                    <div class="ibox-tools">
                        <a href="/users/create" class="btn btn-primary btn-xs">New User</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Birthday</th>
                                    <th>Role</th>
                                    <th>Registered</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($records as $record)

                                    @php

                                    $status = 'Inactive';
                                    $status_color = 'default';
                                    $role = ($record->role == 2)?'Admin':'Regular';
                                    $member = ($record->member == 1)?'Yes':'No';
                                    if($record->status == 1) {
                                        $status = 'Active';
                                        $status_color = 'info';
                                    }

                                    @endphp

                                    <tr class="gradeX">
                                        <td>{{$record->id}}</td>
                                        <td><a href="/users/{{$record->id}}/edit">{{$record->name}}</a></td>
                                        <td><strong>{{$record->phone}}</strong></td>
                                        <td><strong>{{$record->email}}</strong></td>
                                        <td>{{$record->born}}</td>
                                        <td>{{$role}}</td>
                                        <td>{{$record->created_at}}</td>
                                        <td class="center"><span class="btn btn-{{$status_color}} btn-xs">{{$status}}</span></td>
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


