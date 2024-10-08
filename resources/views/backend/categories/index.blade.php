@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/nestable/jquery.nestable.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                "order": [[ 2, "ASC" ]],
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

            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                        output = list.data('order');
                        let order = JSON.stringify(list.nestable('serialize'));
                        console.log(order);

                        const token = $('#token').val();

                        console.log(token);
                        $.ajax({
                            url: "/categories-sort",
                            type:'POST',
                            data: {
                                '_token': token,
                                'order': order,
                            },
                            success:function(response){
                                console.log(response);
                            }//Response

                        })//Ajax
                        
                        /*
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
                */
            };
            // activate Nestable for list 1
            $('#nestable').nestable({
                group: 1
            }).on('change', updateOutput);
            
            // output initial serialised data
            updateOutput($('#nestable').data('output', $('#nestable-output')));

        });

    </script>
    

@endsection

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Categories</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/categories">Dashboard</a>
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
                        <h5>Categories</h5>
                        <div class="ibox-tools">
                            <a href="/categories/create" class="btn btn-primary btn-xs">New Category</a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
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
                                        <td><a href="/categories/{{$record->id}}/edit">{{$record->id}}</a></td>
                                        <td><a href="/categories/{{$record->id}}/edit">{{$record->name}}</a></td>
                                        <td class="center"><span class="btn btn-{{$status_color}} btn-xs">{{$status}}</span></td>
                                    </tr>

                                @endforeach



                            </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
        </div>
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Categories Sorting</h5>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content">
                    <input type="hidden" id="token" value='{{csrf_token()}}'>
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($records_sort as $item)
                                <li class="dd-item" data-id='{{$item->id}}'>
                                    <div class="dd-handle">{{$item->id}} - {{$item->name}}</div>
                                </li>
                            @endforeach
        
                        </ol>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection


