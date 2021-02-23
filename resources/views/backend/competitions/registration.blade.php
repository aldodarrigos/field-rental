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
        <h2>Competition Registration</h2>
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
        <div class="col-lg-10">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$competition->name}}</h5>
                    <div class="ibox-tools">
                        
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Category</th>
                                    <th>Team</th>
                                    <th>Date</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($records as $record)

                                    <tr class="gradeX">
                                        <td><a href="/competition-registration/{{$record->id}}">{{$record->id}}</a></td>
                                        <td><a href="/competition-registration/{{$record->id}}">{{$record->fullname}}</a></td>
                                        <td><strong>{{$record->email}}</strong></td>
                                        <td><strong>{{$record->phone}}</strong></td>
                                        <td><strong>{{$record->cat_name}}</strong></td>
                                        <td><strong>{{$record->team}}</strong></td>
                                        <td><strong>{{$record->created_at}}</strong></td>
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


