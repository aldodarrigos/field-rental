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

            $(".dummyclass").click(function(){
                $(".dummyclass").removeClass('bg-info');
                $(this).toggleClass("bg-info");
                let day = $(this).text();
                let price = $(this).data("price");
                let hour = $(this).data("hour");

                //Set hidden inputs 
                $('#hourSelected').val(hour);//get hour selected
                $('#priceSelected').val(price);

                //Show selected day and price
                $('#show_hour').text(day);
                $('#show_price').text(price);

                
                $('#buttonrental').toggleClass("bg-graytext");
                $('#buttonrental').toggleClass("bg-red");

                if($('#hourSelected').val() != '') {
                    $('#buttonrental').prop('disabled', false);
                    $('#buttonrental').removeClass("bg-graytext");
                    $('#buttonrental').addClass("bg-red");
                }else{
                    $('#buttonrental').prop('disabled', true);
                    $('#buttonrental').addClass("bg-graytext");
                    $('#buttonrental').removeClass("bg-red");
                }
            });

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
                                <option value="1">5 vs 5 players (6 vs 6)</option>
                                <option value="2">7 vs 7 players (9 vs 9)</option>
                            </select>
                        </div>
    
                        <div class="form-group ">
                            <label for='field'>Fields</label>
                            <select class="form-control m-b" name="field" id='field'>
                                <option value="">Pick a Field --</option>
                                @foreach ($fields as $item)
                                    <option value='{{$item->id}}'>{{$item->name}}</option>
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

                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <form action="{{$action}}" method="POST">

                @if ($result == 1)
                <input type="hidden" id="hourSelected" name='hourSelected' value=''>
                <input type="hidden" id="priceSelected" name='priceSelected' value=''>
                <input type="hidden" id="dateSelected" name='dateSelected' value='{{$date}}'>
                <input type="hidden" id="fieldIdSelected" name='fieldIdSelected' value='{{$field->id}}'>
                <input type="hidden" id="fieldSelectedName" name='fieldSelectedName' value='{{$field->name}}'>
                <input type="hidden" id="fieldShortName" name='fieldShortName' value='{{$field->short_name}}'>
                <input type="hidden" id="userIdLogin" name='userIdLogin' value='{{Auth::user()->id}}'>


                @csrf
                
                    
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Booking availability</h5>
                        <div class="ibox-tools">
            
                        </div>
                    </div>
                    <div class="ibox-content">
    
                        @php
                            if($field->tag_id == 1){
                                $field_players_number = '5 vs 5 Players (6 vs 6)';
                            }else if($field->tag_id == 2){
                                $field_players_number = '7 vs 7 Players (9 vs 9)';
                            }
                        @endphp
                        
                        <h1>{{$field->name}} <span style='font-size: .9rem;'><strong>{{$field_players_number}}</strong></span> </h1>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Hour</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                    <tr>
                                        <td>{{$date}}</td>
                                        <td><span id='show_hour'>-----</span></td>
                                        <td><span id='show_price'>-----</span></td>
                                    </tr>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        
                        @for ($i = 0; $i < count($hoursarray); $i++)
                            @php
                                if($hoursarray[$i]['class'] == 'dummyclass'){
                                    $color = 'default';
                                    $pointer = 'cursor-pointer';
                                    $decoration = '';
                                }else{
                                    $color = 'default';
                                    $pointer = 'cursor-not-allowed';
                                    $decoration = 'line-through';
                                }
        
                            @endphp
                            <span class='{{$hoursarray[$i]['class']}} btn btn-{{$color}} btn-sm mb-2 {{$decoration}} {{$pointer}}' id='{{$hoursarray[$i]['class']}}' data-hour='{{$hoursarray[$i]['hour']}}' data-price='{{$hoursarray[$i]['price']}}'>{{$hoursarray[$i]['hour']}}</span>
                        @endfor

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Modify Price</label>
                                    <input type="text" name='alt_price' class="form-control" value="0.00">
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


