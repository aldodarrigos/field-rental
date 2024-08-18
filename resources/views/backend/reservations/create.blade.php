@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <!-- Data picker -->
    <script src="{{asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

    <script>
        $(document).ready(function(){

            var mem = $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $('#buttonrental').prop('disabled', true);

            $(".noselect").click(function(){

                if($(this).hasClass('noselect')){

                        hour_button_switch($(this), '1')
                        sethour($(this))
                        xsa()

                }else{

                    hour_button_switch($(this), '0')
                    unsethour($(this))
                    xsa()

                }


            });

        });


        function sethour(thisHour){

            let hour_text = thisHour.text();
            let price = thisHour.data("price")
            let price_alt = thisHour.data("pricealt")
            let hour = thisHour.data("hour")
            let houralt = thisHour.data("houralt")
            let mark = thisHour.data("mark")

            let hourInt = parseInt(hour.replace(':00', ''))

            $('#hour-'+hourInt).attr('data-price', price)
            $('#hour-'+hourInt).attr('data-pricealt', price_alt)
            $('#hour-'+hourInt).attr('data-mark', mark)
            $('#hour-'+hourInt).attr('data-active', 1)
            $('#hour-'+hourInt).attr('data-houralt', houralt)

        }

        function unsethour(thisHour){

            let hour = thisHour.data("hour")
            let hourInt = parseInt(hour.replace(':00', ''))

            $('#hour-'+hourInt).attr('data-price', '')
            $('#hour-'+hourInt).attr('data-pricealt', '')
            $('#hour-'+hourInt).attr('data-active', 0)
            $('#hour-'+hourInt).attr('data-mark', '')
            $('#hour-'+hourInt).attr('data-houralt', '')

        }


        function xsa(){

            matrix = []
            matrixFinale = []
            let mod_price_regular = $('#alt_price_regular').val()
            let mod_price_hot = $('#alt_price_hot').val()

            for (let i = 23; i > 7; i--) {
                let indexhour = $('#hour-'+i)
                if(indexhour.attr('data-active') == '1'){
                    matrix.push([indexhour.val(), indexhour.attr('data-price'), indexhour.attr('data-pricealt'), indexhour.attr('data-mark'), indexhour.attr('data-houralt')])
                }
            }//endfor

            if(matrix.length == 1){
                let mark = matrix[0][3]//Get if hour is regular or hot
                let houralt = matrix[0][4]//Get alternative format date
                matrixFinale = []
                $('#sumary').html('')

                //if alt regular price is set get this price. If not get regular price
                let calculate_price = (mod_price_regular != '')?mod_price_regular:matrix[0][1]
                if(mark == 'h'){
                    //if alt hot price is set get this price. If not get hot price
                    calculate_price = (mod_price_hot != '')?mod_price_hot:matrix[0][1]
                }
                matrixFinale.push([matrix[0][0], calculate_price])
                let currentDate = $('#dateSelectedAlt').val()

                $('#sumary').append('<tr><td>'+currentDate+'</td><td>'+houralt+'</td><td><span>$ '+calculate_price+'</span></td></tr>')

                $('#total').text(calculate_price)//Total Text
                $('#totalPrice').val(calculate_price)//Total hidden value
                $('#bookingArray').val(JSON.stringify(matrixFinale))
                confirm_button_switch('on')

            }else if(matrix.length > 1){

                matrixFinale = []
                $('#sumary').html('')
                let sumTotal = parseFloat('0.00')

                for (let x = 0; x < matrix.length; x++) {

                    let currentDate = $('#dateSelectedAlt').val()
                    let mark = matrix[x][3]//Get if hour is regular or hot
                    let houralt = matrix[x][4]//Get alternative format date

                    if(x == 0){

                        //if alt regular price is set get this price. If not get regular price
                        let calculate_price = (mod_price_regular != '')?mod_price_regular:matrix[0][1]
                        if(mark == 'h'){
                            //if alt hot price is set get this price. If not get hot price
                            calculate_price = (mod_price_hot != '')?mod_price_hot:matrix[0][1]
                        }

                        matrixFinale.push([matrix[x][0], calculate_price])
                        $('#sumary').append('<tr><td>'+currentDate+'</td><td>'+houralt+'</td><td><span>$ '+calculate_price+'</span></td></tr>')
                        
                        sumTotal += parseFloat(calculate_price)
                        $('#total').text(sumTotal.toFixed(2))//Total Text
                        $('#totalPrice').val(sumTotal.toFixed(2))//Total hidden value
                        $('#bookingArray').val(JSON.stringify(matrixFinale))

                    }else{

                        let price = (matrix[x][2] > 0)?matrix[x][2]:matrix[x][1]

                        //if alt regular price is set get this price. If not get regular price
                        let calculate_price = (mod_price_regular != '')?mod_price_regular:price
                        if(mark == 'h'){
                            //if alt hot price is set get this price. If not get hot price
                            calculate_price = (mod_price_hot != '')?mod_price_hot:price
                        }


                        matrixFinale.push([matrix[x][0], calculate_price])
                        $('#sumary').append('<tr><td>'+currentDate+'</td><td>'+houralt+'</td><td><span>$ '+calculate_price+'</span></td></tr>')

                        sumTotal += parseFloat(calculate_price)
                        $('#total').text(sumTotal.toFixed(2))//Total Text
                        $('#totalPrice').val(sumTotal.toFixed(2))//Total hidden value
                        $('#bookingArray').val(JSON.stringify(matrixFinale))

                    }
                    
                }

                confirm_button_switch('on')

            }else{
                let currentDate = $('#dateSelected').val()
                $('#sumary').html('<tr><td>'+currentDate+'</td><td><span>-----</span></td><td><span>-----</span></td></tr>')//reset table booking
                $('#total').text('0.00')//reset text total
                $('#bookingArray').val('0')//reset hidden value array
                $('#totalPrice').val('0.00')//reset hidden value
                confirm_button_switch('off')
            }

            console.log(matrixFinale)

        }


        function hour_button_switch(thisObj, signal){
            if(signal == '1'){
                thisObj.addClass("btn-info");
                thisObj.removeClass("btn-default");
                thisObj.removeClass("noselect");
                thisObj.addClass("selected");
            }else{
                thisObj.addClass("btn-default");
                thisObj.removeClass("btn-info");
                thisObj.removeClass("selected");
                thisObj.addClass("noselect");
            }
        }

        function confirm_button_switch(signal){
            if(signal == 'on') {
                $('#buttonrental').prop('disabled', false);
                $('#buttonrental').removeClass("bg-graytext");
                $('#buttonrental').addClass("bg-red");
            }else{
                $('#buttonrental').prop('disabled', true);
                $('#buttonrental').addClass("bg-graytext");
                $('#buttonrental').removeClass("bg-red");
            }
        }

        //Prevent multiple submit form
        $('#reservation_form').on('submit', function() {
            $('#buttonrental').attr('disabled','disabled');
        });

        $("#clean").click(function(){               
            location.reload();
        });

        $('#players_number').change(function() {
            playersNumId = $(this).val();
            
            $.ajax({
                url: "/fields_x_players/"+playersNumId,
                type: "GET",
                success: function(data){

                    $('#field').html(data)
                }
            });
        })
    </script>

    <style>
        .cursor-pointer{
            cursor: pointer;
        }
        .line-through{
            text-decoration: line-through;
        }
    </style>

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Booking</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/backend/reservations">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>New Booking</strong>
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
                    <h5>New Booking</h5>
                    <div class="ibox-tools">
        
                    </div>
                </div>
                <div class="ibox-content">

                    <form action="">

                        <div class="form-group ">
                            <label for='players_number'>Field type</label>
                            <select class="form-control m-b" name="players_number" id='players_number'>
                                <option value="0">All fields --</option>
                                <option value="1">5 vs 5 players</option>
                                <option value="2">7 vs 7 players</option>
                            </select>
                        </div>
    
                        <div class="form-group ">
                            <label for='field'>Fields</label>
                            <select class="form-control m-b" name="field" id='field'>
                                <option value="">Pick a Field --</option>
                                @foreach ($fields as $item)
                                    <option value='{{$item->id}}'>{{$item->number.'.'.$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group ">
                            <label for='date'>Date</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name='date' value="{{date('Y-m-d')}}" >
                            </div>
                        </div>
    
                        <div class="hr-line-dashed"></div>
                        
                        <button type="submit" class="btn btn-w-m btn-success">CHECK NOW <i class="fas fa-check"></i></button>

                        <a href="/booking" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>

                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <form action="{{$action}}" method="POST" id="reservation_form">

                @if ($result == 1)

                <input type="hidden" id="dateSelected" name='dateSelected' value='{{$date}}'>
                <input type="hidden" id="dateSelectedAlt" name='dateSelectedAlt' value='{{date('M d, Y', strtotime($date))}}'>
                <input type="hidden" id="fieldIdSelected" name='fieldIdSelected' value='{{$field->id}}'>
                <input type="hidden" id="fieldSelectedName" name='fieldSelectedName' value='{{$field->name}}'>
                <input type="hidden" id="fieldShortName" name='fieldShortName' value='{{$field->short_name}}'>
                <input type="hidden" id="userIdLogin" name='userIdLogin' value='{{Auth::user()->id}}'>
                <input type="hidden" id="bookingArray" name='bookingArray' value='0'>
                <input type="hidden" id="totalPrice" name='totalPrice' value='0.00'>

                @csrf
                <input type="hidden" id="hour-8" value='08:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-9" value='09:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-10" value='10:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-11" value='11:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-12" value='12:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-13" value='13:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-14" value='14:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-15" value='15:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-16" value='16:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-17" value='17:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-18" value='18:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-19" value='19:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-20" value='20:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-21" value='21:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-22" value='22:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                <input type="hidden" id="hour-23" value='23:00' data-price='' data-pricealt='' data-mark='' data-active='0'>
                
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Booking availability</h5>
                        <div class="ibox-tools">
            
                        </div>
                    </div>
                    <div class="ibox-content">
    
                        @php
                            if($field->tag_id == 1){
                                $field_players_number = '5 vs 5 Players';
                            }else if($field->tag_id == 2){
                                $field_players_number = '7 vs 7 Players';
                            }
                        @endphp
                        
                        <h1>{{$field->number.'.'.$field->name}} <span style='font-size: .9rem;'><strong>{{$field_players_number}}</strong></span> </h1>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Hour</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody id="sumary">
                                    <tr>
                                        <td>{{date('M d, Y', strtotime($date))}}</td>
                                        <td><span>-----</span></td>
                                        <td><span>-----</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @for ($i = 0; $i < count($hoursarray); $i++)
                            @php
                                if($hoursarray[$i]['class'] == 'noselect'){
                                    $color = 'default';
                                    $pointer = 'cursor-pointer';
                                    $decoration = '';
                                }else{
                                    $color = 'default';
                                    $pointer = 'cursor-not-allowed';
                                    $decoration = 'line-through';
                                }

                                if ($hoursarray[$i]['hour'] == '08:00'){ $hour_fix = '8 AM'; }
                                else if ($hoursarray[$i]['hour'] == '09:00'){ $hour_fix = '9 AM'; }
                                else if ($hoursarray[$i]['hour'] == '10:00'){ $hour_fix = '10 AM'; }
                                else if ($hoursarray[$i]['hour'] == '11:00'){ $hour_fix = '11 AM'; }
                                else if ($hoursarray[$i]['hour'] == '12:00'){ $hour_fix = '12 AM'; }
                                else if ($hoursarray[$i]['hour'] == '13:00'){ $hour_fix = '1 PM'; }
                                else if ($hoursarray[$i]['hour'] == '14:00'){ $hour_fix = '2 PM'; }
                                else if ($hoursarray[$i]['hour'] == '15:00'){ $hour_fix = '3 PM'; }
                                else if ($hoursarray[$i]['hour'] == '16:00'){ $hour_fix = '4 PM'; }
                                else if ($hoursarray[$i]['hour'] == '17:00'){ $hour_fix = '5 PM'; }
                                else if ($hoursarray[$i]['hour'] == '18:00'){ $hour_fix = '6 PM'; }
                                else if ($hoursarray[$i]['hour'] == '19:00'){ $hour_fix = '7 PM'; }
                                else if ($hoursarray[$i]['hour'] == '20:00'){ $hour_fix = '8 PM'; }
                                else if ($hoursarray[$i]['hour'] == '21:00'){ $hour_fix = '9 PM'; }
                                else if ($hoursarray[$i]['hour'] == '22:00'){ $hour_fix = '10 PM'; }
                                else if ($hoursarray[$i]['hour'] == '23:00'){ $hour_fix = '11 PM'; }
                            @endphp
                            <span class='{{$hoursarray[$i]['class']}} btn btn-{{$color}} btn-sm mb-2 {{$decoration}} {{$pointer}}' id='{{$hoursarray[$i]['class']}}' data-hour='{{$hoursarray[$i]['hour']}}' data-houralt='{{$hour_fix}}' data-price='{{$hoursarray[$i]['price']}}' data-pricealt='{{$hoursarray[$i]['price_alt']}}' data-mark='{{$hoursarray[$i]['mark']}}' style="width:60px;">{{$hour_fix}}</span>
                        @endfor

                        <span class='btn btn-default btn-sm mb-2 cursor-pointer' id='clean'> <i class="fas fa-sync"></i> </span>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Custom regular hour price</label>
                                    <input type="text" name='alt_price_regular' id='alt_price_regular' class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Custom high demand hour</label>
                                    <input type="text" name='alt_price_hot' id='alt_price_hot' class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Client name</label>
                                    <input type="text" name='user_rel' id='user_rel' class="form-control" value="">
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-group ">
                            <label>Note</label>
                            <input type="text" name='note' class="form-control" value="">
                        </div>

                        <div class="hr-line-dashed"></div>
    
                        <button type="submit" id='buttonrental' class="btn btn-w-m btn-info"><i class="fas fa-check"></i> CONFIRM</button>
                        
                    </div>
                </div>
    
                @endif

            </form>
        </div>
    </div>
</div>






@endsection


