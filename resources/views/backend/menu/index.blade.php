@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <script src="{{asset('inspinia/js/plugins/nestable/jquery.nestable.js')}}"></script>

    <script>
        $(document).ready(function(){

            $('.delete').hide();

            $('.btn-delete').click(function() {
                let idlink = $(this).data('id');
                $('.delete').hide();
                $('.del-'+idlink).fadeIn();
            });

            $('.close_confirm').click(function() {
                $('.delete').hide();
            });

            var updateOutput = function (e) {

                var list = e.length ? e : $('#nestable'),
                        output = list.data('order');
                        let order = JSON.stringify(list.nestable('serialize'));
                        console.log(order);
                        const token = $('#token').val();

                        console.log(token);
                        $.ajax({
                            url: "/menu-sort",
                            type:'POST',
                            data: {
                                '_token': token,
                                'order': order,
                            },
                            success:function(response){
                                console.log(response);
                                location.reload();
    
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
                group: 1,
                maxDepth: 2,
                reject: [{
                    rule: function () {
                        // The this object refers to dragRootEl i.e. the dragged element.
                        // The drag action is cancelled if this function returns true
                        var ils = $(this).find('>ol.dd-list > li.dd-item');
                        for (var i = 0; i < ils.length; i++) {
                            var datatype = $(ils[i]).data('type');
                            if (datatype === 'child')
                                return true;
                        }
                        return false;
                    },
                    action: function (nestable) {
                        // This optional function defines what to do when such a rule applies. The this object still refers to the dragged element,
                        // and nestable is, well, the nestable root element
                        alert('Can not move this item to the root');
                    }
                }]
            })
            // .on('change', updateOutput);

            $('#saveOrder').on('click',updateOutput);
            // output initial serialised data
            // updateOutput($('#nestable').data('output', $('#nestable-output')));

        });

    </script>
    
@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Menu</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/menu">Dashboard</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-7">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Menu Links</h5>
                    <div class="ibox-tools">
                        <a href="/menu/create" class="btn btn-primary btn-xs">New Link</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Delete</th>
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

                                    @endphp

                                    <tr class="gradeX">
                                        <td><a href="/menu/{{$record->id}}/edit">{{$record->name}}</a></td>
                                        <td>{{$record->slug}}</td>
                                        <td class="center"><span class="btn btn-{{$status_color}} btn-xs">{{$status}}</span></td>
                                        <td class="center">
                                            <button class="btn btn-danger btn-xs btn-delete" data-id='{{$record->id}}'>Delete</button>
                                            <div class="delete del-{{$record->id}}">Delete? <a href="/delete-menu/{{$record->id}}">Yes</a> / <a href="#" class='close_confirm' role="button">No</a></div>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Links active sorting</h5>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content">
                    <input type="hidden" id="token" value='{{csrf_token()}}'>
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($records_active as $record)
                                @if($record->parent_id == 0)
                                <li class="dd-item" data-id='{{$record->id}}'>
                                    <div class="dd-handle">{{$record->id}} - {{$record->name}}</div>
                                    @if($record->children)
                                        <ol class="dd-list">
                                            @foreach($record->children as $child)
                                                <li class="dd-item" data-id="{{$child->id}}">
                                                    <div class="dd-handle">{{$child->id}} - {{$child->name}}</div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif
                                </li>
                                @endif
                            @endforeach
                            <div class="text-right mt-4">
                                <button id="saveOrder" class="btn btn-primary btn-xs" data-id=''>Guardar</button>
                            </div>
                        </ol>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


