@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <script src="{{asset('inspinia/js/plugins/nestable/jquery.nestable.js')}}"></script>

    <script>
        $(document).ready(function(){

            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                        output = list.data('order');
                        let order = JSON.stringify(list.nestable('serialize'));
                        console.log(order);

                        const token = $('#token').val();

                        console.log(token);
                        $.ajax({
                            url: "/services-sort",
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
        <h2>Services Order</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/backend-services">Dashboard</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <input type="hidden" id="token" value='{{csrf_token()}}'>
    <div class="row">
        <div class="col-lg-8">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Services order</h5>
                <div class="ibox-tools">
                    
                </div>
            </div>
            <div class="ibox-content">

                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach ($records as $record)
                            <li class="dd-item" data-id='{{$record->id}}'>
                                <div class="dd-handle">{{$record->id}} - {{$record->name}}</div>
                            </li>
                        @endforeach

                    </ol>
                </div>

                <textarea id="nestable-output" class="form-control" spellcheck="false" data-gramm="false"></textarea>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sort</th>
                        <th>Flag</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($records as $record)

                            @php

                            $status = 'UnPublish';
                            $status_color = 'default';
                            if($record->status == 1) {
                                $status = 'Publish';
                                $status_color = 'info';
                            }
                            $flag = ($record->flag == 1)?'Flagged':'';

                            @endphp

                            <tr class="gradeX">
                                <td><a href="/backend-services/{{$record->id}}/edit">{{$record->name}}</a></td>
                                <td>{{$record->sort}}</td>
                                <td>{{$flag}}</td>
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


