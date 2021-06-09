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
        <h2>Teams Registration</h2>
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
                    <h5>teams registration</h5>
                    <div class="ibox-tools">
                        
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Team Name</th>
                                    <th>Uniform</th>
                                    <th>Gender</th>
                                    <th>Category</th>
                                    <th>Competition</th>
                                    <th>Registrant</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Read</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($records as $record)

                                    @php
                                        $gender = ($record->gender == 1)?'Female':'Male';  
                                        $status = ($record->registration_status == 1)?'Paid':'Pending payment';  
                                        $status_color = ($record->registration_status == 1)?'btn-info':'btn-default';  
                                        $read = ($record->read == 1)?'Read':'unread';  
                                        $read_color = ($record->read == 0)?'btn-info':'btn-default';  
                                    @endphp

                                    <tr class="gradeX">
                                        <td><a href="/teams-detail/{{$record->registration_id}}">{{$record->team_id}}</a></td>
                                        <td>{{$record->team_name}}</td>
                                        <td><strong>{{$record->uniforms}}</strong></td>
                                        <td><strong>{{$gender}}</strong></td>
                                        <td><strong>{{$record->category}}</strong></td>
                                        <td><strong>{{$record->competition_name}}</strong></td>
                                        <td><a href="/teams-detail/{{$record->registration_id}}">{{$record->registrant}}</a></td>
                                        <td><strong>{{date('M d, Y', strtotime($record->date))}}</strong></td>
                                        <td><span class="btn btn-xs {{$status_color}}">{{$status}}</span></td>
                                        <td><span class="btn btn-xs {{$read_color}}">{{$read}}</span></td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>

                        <div class="hr-line-dashed"></div>
                
                        <a href="/competitions" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection


