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
                "order": [[ 5, "desc" ]],
                "columnDefs": [
                    {
                        "targets": [ 5 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 3 ],
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
                    <!--<a href="/content/create" class="btn btn-primary btn-xs">New Content</a>-->
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Link</th>
                <th>Update</th>
                <th>Status</th>
                <th>HideDate</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($records as $record)

                    @php

                    $status = 'Unpublished';
                    $status_color = 'default';
                    if($record->content_status == 1) {
                        $status = 'Published';
                        $status_color = 'info';
                    }

                    @endphp

                    <tr class="gradeX">
                        <td><a href="/content/{{$record->id}}/edit">{{$record->title}}</a></td>
                        <td>{{$record->subtitle}}</td>
                        <td>{{$record->link}}</td>
                        <td class="center">{{date('M d, Y', strtotime($record->updated_at))}}</td>
                        <td class="center"><span class="btn btn-{{$status_color}} btn-xs">{{$status}}</span></td>
                        <td>{{date('Y-m-d', strtotime($record->updated_at))}}</td>
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


