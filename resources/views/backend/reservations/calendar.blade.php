@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <!-- Full Calendar -->
    <link href="{{asset('inspinia/css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
    <script src="{{asset('inspinia/js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>

    <script>
        $(document).ready(function() {

            /* initialize the external events
            -----------------------------------------------------------------*/

            $('#external-events div.external-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1111999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });

            /* initialize the calendar
            -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            console.log(new Date(y, m, d-2));
            var mydate = new Date('2020-16-01');
            let reservations;

            $.ajax({
                url: "/get-reservations",
                type: "GET",
                success: function(data){
                    console.log(data);
                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        editable: false,
                        droppable: false, // this allows things to be dropped onto the calendar
                        eventRender : function(event, element) {
                            element[0].title = event.note;
                        },
                        drop: function() {
                            // is the "remove after drop" checkbox checked?
                            if ($('#drop-remove').is(':checked')) {
                                // if so, remove the element from the "Draggable Events" list
                                $(this).remove();
                            }
                        },
                        events: data
                    });

            


                }
            });

        });
    </script>

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Calendar</h2>
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
                <h5>Booking Calendar</h5>
                <div class="ibox-tools">
                    <a href="/calendar-fields" class="btn btn-xs btn-success text-white" style='color: #fff!Important;'>Fields Calendar <i class="far fa-calendar-alt"></i></a> 
                    <a href="/booking/create" class="btn btn-primary btn-xs">New Booking</a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <div id="calendar"></div>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>






@endsection


