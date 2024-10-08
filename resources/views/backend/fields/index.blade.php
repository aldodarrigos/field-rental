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
                "order": [[ 6, "desc" ]],
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
        <h2>Content</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/content">Dashboard</a>
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
                    <a href="/backend-fields/create" class="btn btn-primary btn-xs">New Content</a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>Name</th>
                <th>P.Regular</th>
                <th>P.Regular (2nd H)</th>
                <th>P.Night</th>
                <th>P.Night (2nd H)</th>
                <th>P.Weekend</th>
                <th>P.Weekend (2nd H)</th>
                <th>P.Number</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($records as $record)

                    @php

                    $status = 'Unpublished';
                    $status_color = 'default';
                    if($record->status == 1) {
                        $status = 'Published';
                        $status_color = 'info';
                    }
                    $players_number = ($record->tag_id == 1)?'5 vs 5 players':'7 vs 7 players';

                    @endphp

                    <tr class="gradeX">
                        <td><a href="/backend-fields/{{$record->id}}/edit">{{$record->number.'. '.$record->name}}</a></td>
                        <td><strong>{{$record->price_regular}}</strong></td>
                        <td><strong>{{$record->price_regular_alt}}</strong></td>
                        <td>{{$record->price_night}}</td>
                        <td>{{$record->price_night_alt}}</td>
                        <td>{{$record->price_weekend}}</td>
                        <td>{{$record->price_weekend_alt}}</td>
                        <td>{{$players_number}}</td>
                        <td class="center"><span class="btn btn-{{$status_color}} btn-xs">{{$status}}</span></td>
                    </tr>

                @endforeach



            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>






@endsection


