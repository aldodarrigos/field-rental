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


<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Booking history</h5>
            <div class="ibox-tools">
                <a href="" class="btn btn-primary btn-xs">New Booking</a>
            </div>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Status</th>
            <th>Field</th>
            <th>User</th>
            <th>Email</th>
            <th>Price</th>
            <th>Booking</th>
            <th>RegDate</th>
            <th>Paypal</th>
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
                @endphp

                <tr class="gradeX">
                    <td><span class="btn btn-{{$status_color}} btn-xs">{{$status}}</span></td>
                    <td>{{$reservation->field_name}}</td>
                    <td><strong>{{$reservation->user_name}}</strong></td>
                    <td>{{$reservation->user_email}}</td>
                    <td>${{$reservation->price}}</td>
                    <td class="center text-{{$status_color}}">{!!$reservation->res_date.' <strong>'.$reservation->hour.'</strong>'!!}</td>
                    <td class="center">{{$reservation->created_at}}</td>
                    <td class="center">{{$reservation->res_code}}</td>
                </tr>

            @endforeach



        </tfoot>
        </table>
            </div>

        </div>
    </div>
</div>
</div>






@endsection


