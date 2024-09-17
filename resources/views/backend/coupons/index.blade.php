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
                // "order": [[ 7, "desc" ]],
                columnDefs: [
                    // {
                    //     "targets": [ 7 ],
                    //     "visible": false,
                    //     "searchable": false
                    // },
                    // {
                    //     "targets": [ 6 ],
                    //     "searchable": false,
                    //     "sortable": false
                    // },
                    // {
                    //     "targets": [ 5 ],
                    //     "searchable": true,
                    //     "sortable": false
                    // },
                    // {
                    //     "targets": [ 4 ],
                    //     "searchable": true,
                    //     "sortable": false
                    // }
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
        <h2>Coupons</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/booking">Dashboard</a>
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
                    <h5>Coupons Availabe</h5>
                    <div class="ibox-tools">
                        <a href="/coupons/create" class="btn btn-primary btn-xs">New Coupon</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Code Coupon</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Limit use</th>
                                    <th>Total use</th>
                                    <th>Validity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($coupons as $coupon)
                                    <tr class="gradeX">                        
                                        <td><a href="/coupons/{{$coupon->id}}/edit">{{$coupon->code}}</a></td>
                                        <td>{{$coupon->type}}</td>
                                        <td>@if($coupon->type =='fixed')
                                            ${{$coupon->amount}}
                                            @else
                                            {{$coupon->amount}}%
                                            @endif
                                            </td>
                                        <td>{{$coupon->start_date}}</td>
                                        <td>{{$coupon->end_date}}</td>
                                        <td>{{$coupon->use_limit}}</td>
                                        <td>
                                            @if($coupon->total_use > 0)
                                                <a href="/coupons/history/{{$coupon->id}}"> {{$coupon->total_use}}</a> 
                                            @else
                                                {{$coupon->total_use}}
                                            @endif
                                        </td>
                                        @php
                                            $today = \Carbon\Carbon::now()->toDateString();
                                            $endDate = \Carbon\Carbon::parse($coupon->end_date)->toDateString();
                                            // dd($coupon->total_use);
                                            $isExpired = false;
                                            if($coupon->total_use >= $coupon->use_limit || $today > $endDate){
                                                $isExpired = true;
                                            }
                                        @endphp
                                        <td>
                                            @if($isExpired == true)
                                                <span class="badge badge-dark">Expired</span>
                                            @else
                                                <span class="badge badge-primary">Live</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($coupon->status == '1')
                                            <span class="badge badge-primary">Active</span>
                                            @else
                                            <span class="badge badge-dark">Inactive</span>
                                            @endif
                                        </td>
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


