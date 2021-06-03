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
        <h2>Soccer Clinic</h2>
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
                    <h5>Soccer Clinic events</h5>
                    <div class="ibox-tools">
                        <a href="/summerclin/create" class="btn btn-primary btn-xs">New Event</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Registration</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($records as $record)

                                    @php
                                        $status_color = ($record->status == 1)?'btn-info':'btn-default';  
                                        $read = ($record->read == 1)?'Read':'unread';  
                                        $read_color = ($record->read == 0)?'btn-info':'btn-default';  
                                        $statustxt = '';
                                        $status_color = 'btn-default';

                                        foreach ($status as $item) {
                                            if ($item->id == $record->status) {
                                                $statustxt = $item->name;
                                            }
                                            if ($item->id == 2) {
                                                $status_color = 'btn-info';
                                            }
                                        }
                                    @endphp


                                    <tr class="gradeX">
                                        <td><a href="/summerclin/{{$record->id}}/edit">{{$record->id}}</a></td>
                                        <td><a href="/summerclin/{{$record->id}}/edit">{{$record->name}}</a></td>
                                        <td><strong>{{date('M d, Y', strtotime($record->created_at))}}</strong></td>
                                        <td><span class="btn btn-xs {{$status_color}}">{{$statustxt}}</span></td>
                                        <td><a href="/summerclin-registration/{{$record->id}}">Registration</a></td>
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


