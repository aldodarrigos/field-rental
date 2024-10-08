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
                "order": [[ 1, "ASC" ]]

            });

        });

    </script>
    

@endsection

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Tags</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/backend-tags">Dashboard</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tags</h5>
                    <div class="ibox-tools">
                        <a href="/backend-tags/create" class="btn btn-primary btn-xs">New Tag</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
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

                                @endphp

                                <tr class="gradeX">
                                    <td><a href="/backend-tags/{{$record->id}}/edit">{{$record->name}}</a></td>
                                    <td>{{$record->slug}}</td>
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


