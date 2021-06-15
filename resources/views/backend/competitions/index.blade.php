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
                "order": [[ 7, "desc" ]],
                columnDefs: [
                    {
                        "targets": [ 4 ],
                        "sortable": false,
                        "searchable": true
                    },
                    {
                        "targets": [ 5 ],
                        "sortable": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 7 ],
                        "visible": false,
                        "sortable": false,
                        "searchable": false
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
        <h2>Competitions</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/competitions">Dashboard</a>
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
                        <a href="/competitions/create" class="btn btn-primary btn-xs">New Competition</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Modality</th>
                                    <th>Create</th>
                                    <th>Form</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($records as $record)

                                    @php

                                    $registration_link = ($record->trials == 1)?'tryout-registration':'team-registration';

                                    $statustxt = 'Inactive';
                                    $status_color = 'default';

                                    $type = 'Tournament';
                                    $slug = 'tournaments';
                                    $dashboard_slug = 'team-competition-registration';

                                    if($record->is_league == 1){
                                        $type = 'League';
                                        $slug = 'leagues';
                                        $dashboard_slug = 'tryout-competition-registration';
                                    }

                                    foreach ($status as $item) {
                                        if($item->id == $record->status){
                                            $statustxt = $item->name;
                                            $status_color = ($item->id != 1)?'info':'default';
                                        }
                                    }

                                    $modality = ($record->trials == 0)?'Teams':'Tryouts';

                                    @endphp

                                    <tr class="gradeX">
                                        <td><strong>{{$record->id}}</strong></td>
                                        <td>
                                            <a href="/competitions/{{$record->id}}/edit">{{$record->name}}</a> | 
                                            <a href="/{{$slug}}/{{$record->slug}}" class="text-info" target='_blank'> Test view</a> 
                                        </td>

                                        <td>{{$type}}</td>
                                        <td>{{$modality}}</td>

                                        <td><strong>{{date('M d, Y', strtotime($record->created_at))}}</strong></td>
                                       
                                        <!--
                                        <td> 
                                            <a href="/{{$registration_link}}/{{$record->id}}/{{$record->slug}}" class="text-info" target='_blank'> Test view</a>
                                        </td>
                                        -->
                                        <td> 
                                            <a href="/{{$dashboard_slug}}/{{$record->id}}" class="text-info">Registration</a>
                                        </td>

                                        <td class="center"><span class="btn btn-{{$status_color}} btn-xs">{{$statustxt}}</span></td>
                                        <td><strong>{{date('Y-m-d', strtotime($record->created_at))}}</strong></td>
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


