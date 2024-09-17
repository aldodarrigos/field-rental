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
        <h2>Coupons History</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/coupons">Coupons</a>
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
                                    <th>User</th>
                                    <th>Code Reservation</th>
                                    <th>Discount Amount</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($histories as $history)
                                    <tr class="gradeX">                        
                                        <td><a href="/coupons/{{$history->coupon->id}}/edit">{{$history->coupon->code}}</a></td>
                                        <td>{{$history->user->name}}</td>
                                        <td>
                                            <a href="/booking-coupons/{{$history->order_id}}/{{$history->coupon->id}}">{{$history->order_id}}</a>
                                        </td>
                                        <td>{{$history->discount_amount}}</td>
                                        <td>{{$history->created_at}}</td>
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


