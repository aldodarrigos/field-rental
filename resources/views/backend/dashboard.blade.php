@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Issue list</h5>
                    <div class="ibox-tools">
                        <a href="" class="btn btn-primary btn-xs">Add new issue</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                    <table class="table table-hover issue-tracker">
                        <tbody>
                            
                        @foreach ($reservations as $reservation)

                            @php
                            $date = new DateTime($reservation->res_date);
                            $now = new DateTime();
                            $status = 'Pending';
                            $status_bg = 'default';
                            if($date < $now) {
                                $status = 'Finished';
                                $status_bg = 'success';
                            }
                            @endphp

                            <tr>
                                <td><span class="label label-{{$status_bg}}">{{$status}}</span></td>
                                <td>
                                    {{$reservation->field_name}}
                                </td>
                                <td>{{$reservation->user_name}}</td>
                                <td>{{$reservation->user_email}}</td>
                                <td>{{$reservation->res_date.' '.$reservation->hour}}</td>
                                <td>{{$reservation->res_code}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection


