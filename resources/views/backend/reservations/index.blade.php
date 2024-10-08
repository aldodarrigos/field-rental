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
                "order": [[ 7, "desc" ]],
                "columnDefs": [
                    {
                        "targets": [ 7 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 6 ],
                        "searchable": false,
                        "sortable": false
                    },
                    {
                        "targets": [ 5 ],
                        "searchable": true,
                        "sortable": false
                    },
                    {
                        "targets": [ 4 ],
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
        <h2>Booking</h2>
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
                    <h5>Booking history</h5>
                    <div class="ibox-tools">
                        <a href="/calendar-fields" class="btn btn-xs btn-primary text-white" style='color: #fff!Important;'>Fields Calendar <i class="far fa-calendar-alt"></i></a>
                        <a href="/calendar" class="btn btn-xs btn-success text-white" style='color: #fff!Important;'>Calendar <i class="far fa-calendar-alt"></i></a>
                        <a href="/booking/create" class="btn btn-primary btn-xs">New Booking</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Field</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Price</th>
                                    {{-- <th>Final Price</th> --}}
                                    {{-- <th>Discount</th> --}}
                                    <th>Booking</th>
                                    <th>Obs</th>
                                    <th>Note</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reservations as $reservation)

                                    @php
                                    $date = new DateTime($reservation->res_date);
                                    $now = new DateTime();
                                    $status = 'Pending';
                                    $status_color = 'info';
                                    if($date < $now) {
                                        $status = 'Finished';
                                        $status_color = 'default';
                                    }
                                    $user_name = ($reservation->user_rel != null)?$reservation->user_rel:$reservation->user_name;
                                    // $discount_check = 'X';
                                    // if($reservation->discount === true){
                                    //     $discount_check = '✔️';
                                    // }
                                    @endphp

                                    <tr class="gradeX">                        
                                        <td><strong>{{$reservation->field_number}}.</strong> {{$reservation->field_name}}</td>
                                        <td><strong>{{$user_name}}</strong></td>
                                        <td>{{$reservation->user_email}}</td>
                                        <td>${{$reservation->price}}</td>
                                        {{-- <td>
                                        @if(!is_null($reservation->final_price))
                                            ${{$reservation->final_price}}
                                        @endif
                                        </td> --}}
                                        {{-- <td>
                                            {{$discount_check}}
                                        </td> --}}
                                        <td class="center text-{{$status_color}}">{!!date('M d, Y', strtotime($reservation->res_date)).' <strong>'.date('h:i A', strtotime($reservation->hour)).'</strong>'!!}</td>
                                        <td>{{$reservation->note}}</td>
                                        <td class="center"><a href="/booking/{{$reservation->id}}/edit" class="btn btn-success btn-xs">Details</a></td>
                                        <td>{!!date('Y-m-d', strtotime($reservation->res_date)).' '.date('h:i A', strtotime($reservation->hour))!!}</td>
                                    </tr>

                                @endforeach
                                @php
                                // dd($reservations);
                                @endphp
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>






@endsection


