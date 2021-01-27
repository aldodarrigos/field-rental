@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    
@endsection

<x-frontend.pieces.section_header title='Fields' bread='Our fields'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <div class="col-span-6">
            <form action="/fieldsrental" method="POST" id='bookform'>
            {{ csrf_field() }}
            <x-frontend.forms.input_select>
                <x-slot name='label'>Field Type</x-slot>
                <x-slot name='id'>players_number</x-slot>
                <x-slot name='height'>big</x-slot>
                <x-slot name='bg'>light</x-slot>
                <x-slot name='label_on_off'>on</x-slot>
                
                @php
                
                if(isset($_GET['players_number'])){
                    if($_GET['players_number']!=0){
                        $x5selected = ($_GET['players_number'] == 1)?'selected':'';
                        $x7selected = ($_GET['players_number'] == 2)?'selected':'';
                    }else{
                        $x5selected = ($_GET['field_type'] == 1)?'selected':'';
                        $x7selected = ($_GET['field_type'] == 2)?'selected':'';
                    }
                }else if($players_number != ''){
                    $x5selected = ($players_number == 1)?'selected':'';
                    $x7selected = ($players_number == 2)?'selected':'';
                }else{
                    $x5selected = '';
                    $x7selected = '';
                }

                @endphp

                <option value="0">All fields --</option>
                <option value="1" {{$x5selected}}>5 vs 5 players (6 vs 6)</option>
                <option value="2" {{$x7selected}}>7 vs 7 players (9 vs 9)</option>
            </x-frontend.forms.input_select>

            <x-frontend.forms.input_select>
                <x-slot name='label'>field</x-slot>
                <x-slot name='id'>field</x-slot>
                <x-slot name='height'>big</x-slot>
                <x-slot name='bg'>light</x-slot>
                <x-slot name='label_on_off'>on</x-slot>

                <option value="" selected>Pick a Field --</option>

                @foreach ($fields_select as $item)
                    @php
                    if(isset($_GET['field'])){
                        $selected = ($_GET['field'] == $item->id)?'selected':'';
                    }else if($field_id != ''){
                        $selected = ($field_id == $item->id)?'selected':'';
                    }else{
                        $selected = '';
                    }
                    @endphp
                    <option value="{{$item->id}}" {{$selected}}>{{$item->number.'. '.$item->name}}</option>
                @endforeach

            </x-frontend.forms.input_select>

            @php
                if(isset($_GET['field'])){
                    $default_date = ($_GET['field']!=null)?$_GET['date']:date('Y-m-d');
                }else if($date != ''){
                    $default_date = $date;
                }else{
                    $default_date = date('Y-m-d');
                }
                
            @endphp

            <x-frontend.forms.input_text>
                <x-slot name='type'>date</x-slot>
                <x-slot name='label'>Pick a Date</x-slot>
                <x-slot name='id'>date</x-slot>
                <x-slot name='default'>{{$default_date}}</x-slot>
                <x-slot name='placeholder'>Pick a Date</x-slot>
                <x-slot name='autocomplete'>on</x-slot>
                <x-slot name='required'>on</x-slot>
                <x-slot name='height'>big</x-slot>
                <x-slot name='bg'>light</x-slot>
                <x-slot name='label_on_off'>on</x-slot>
            </x-frontend.forms.input_text>
            
            <div class="text py-4">
                <x-frontend.buttons.form>
                    <x-slot name='bg'>red</x-slot>
                    <x-slot name='size'>big</x-slot>
                    <x-slot name='text'>Check now <i class="fas fa-check text-md pl-1"></i></x-slot>
                    <x-slot name='class'></x-slot>
                    <x-slot name='id'>checknow</x-slot>
                    <x-slot name='on_off'></x-slot>
                </x-frontend.buttons.form>
            </div>



            </form>
            
            
        </div>
        <div class="col-span-6">
  
            <form action="/payment" method="POST" id='bookform'>

                {{ csrf_field() }}

                @if ($result == 1)

                <input type="hidden" id="hourSelected" name='hourSelected' value=''>
                <input type="hidden" id="priceSelected" name='priceSelected' value=''>
                <input type="hidden" id="dateSelected" name='dateSelected' value='{{$date}}'>
                <input type="hidden" id="fieldIdSelected" name='fieldIdSelected' value='{{$field->id}}'>
                <input type="hidden" id="fieldShortName" name='fieldShortName' value='{{$field->short_name}}'>
                <input type="hidden" id="fieldSelectedName" name='fieldSelectedName' value='{{$field->name}}'>
                @if (isset(Auth::user()->name))
                    <input type="hidden" id="userIdLogin" name='userIdLogin' value='{{Auth::user()->id}}'>
                @else
                    <input type="hidden" id="userIdLogin" name='userIdLogin' value='0'>
                @endif

                @php
                    if($field->tag_id == 1){
                        $field_players_number = '5 vs 5 Players (6 vs 6)';
                    }else if($field->tag_id == 2){
                        $field_players_number = '7 vs 7 Players (9 vs 9)';
                    }
                @endphp
    
                <x-frontend.cards.field_booking>
                
                    <x-slot name='image'>{{$field->img_md}}</x-slot>
                    <x-slot name='image_height'>250p</x-slot>
                    <x-slot name='tag'>{{$field_players_number}}</x-slot>
                    <x-slot name='bg'>blue</x-slot>
    
                    <x-slot name='subtitle'>{{$field_players_number}}</x-slot>
                    <x-slot name='title'>{{$field->name}}</x-slot>
                    <x-slot name='date'>{{$date}}</x-slot>
                    <x-slot name='hour'><span id='day_hour'></span></x-slot>
                    <x-slot name='price'>$<span id='price'></span></x-slot>
    
                    <x-slot name='sumary'>
    
                        <div class="inline-flex flex-wrap gap-2 mb-4">

                            @for ($i = 0; $i < count($hoursarray); $i++)
                                @php
                                    if($hoursarray[$i]['class'] == 'dummyclass'){
                                        $color = 'bg-green';
                                        $pointer = 'cursor-pointer';
                                        $decoration = '';
                                    }else{
                                        $color = 'bg-red';
                                        $pointer = 'cursor-not-allowed';
                                        $decoration = 'line-through';
                                    }
                                    if($hoursarray[$i]['hour'] == '8:00'){ $hour_fix = '8 AM'; }
                                    else if ($hoursarray[$i]['hour'] == '9:00'){ $hour_fix = '9 AM'; }
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

                                @endphp
                                <x-frontend.buttons.hour>
                                    <x-slot name='bg'>{{$color}}</x-slot>
                                    <x-slot name='text'>{{$hour_fix}}</x-slot>
                                    <x-slot name='class'>{{$hoursarray[$i]['class']}}</x-slot>
                                    <x-slot name='dataHour'>{{$hoursarray[$i]['hour']}}</x-slot>
                                    <x-slot name='dataPrice'>{{$hoursarray[$i]['price']}}</x-slot>
                                    <x-slot name='pointer'>{{$pointer}}</x-slot>
                                    <x-slot name='decoration'>{{$decoration}}</x-slot>
                                </x-frontend.buttons.hour>
                            @endfor
  
                            <x-frontend.buttons.hour>
                                <x-slot name='bg'>bg-green</x-slot>
                                <x-slot name='text'><i class="fas fa-sync"></i></x-slot>
                                <x-slot name='class'>clean</x-slot>
                                <x-slot name='dataHour'></x-slot>
                                <x-slot name='dataPrice'></x-slot>
                                <x-slot name='pointer'>cursor-pointer</x-slot>
                                <x-slot name='decoration'></x-slot>
                            </x-frontend.buttons.hour>
             
                        </div>

                        <div class="flex gap-x-4 text-xs mb-2">
                            <div><span><i class="fas fa-circle text-green"></i></span> Available</div>
                            <div><span><i class="fas fa-circle text-warning"></i></span> Selected</div>
                            <div><span><i class="fas fa-circle text-red"></i></span> Not available</div>
                        </div>

                        <div class="text-xs">
                            <p>If you want to book more than 1 hour please contact: <strong>{{$setting->phone_1}}</strong></p>
                        </div>
    
                        <script>
    
                            $(document).ready(function() {
                                $('#buttonrental').prop('disabled', true);
                                $('#day_hour').text('-----');
                                $('#price').text('-----');
                            });
    
                            $(".dummyclass").click(function(){
                                $(".dummyclass").removeClass('bg-warning');
                                $(".dummyclass").addClass('bg-green');
                                $(".dummyclass").addClass('text-gray');
                                $(".dummyclass").removeClass('text-black');

                                $(this).addClass("bg-warning");
                                $(this).removeClass("bg-green");
                                $(this).removeClass("text-gray");
                                $(this).addClass("text-black");
                                let day = $(this).text();
                                let price = $(this).data("price");
                                let hour = $(this).data("hour");
                                $('#hourSelected').val(hour);
                                $('#day_hour').text(day);
                                $('#price').text(price);
                                $('#priceSelected').val(price);
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

                            $("#clean").click(function(){
                                $(".dummyclass").removeClass('bg-warning');
                                $(".dummyclass").addClass('bg-green');
          
                                $('#hourSelected').val('');
                                $('#day_hour').text('-----');
                                $('#price').text('-----');
                                $('#priceSelected').val('');
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
                        </script>
    
    
                    </x-slot>
                    <x-slot name='sumary_color'>white</x-slot>
     
                    <x-slot name='button_link'></x-slot>
                    <x-slot name='button_text'>Confirm and Pay <i class="far fa-credit-card"></i></x-slot>
                    <x-slot name='button_size'>big</x-slot>
    
                
                </x-frontend.cards.field_booking>
                    
                @else

                    <x-frontend.pieces.ad_frame title='{{$map->title}}'>
                        <x-slot name='frame_icon'></x-slot>
                        <x-slot name='bg'>white</x-slot>
                    
                        <img class="max-w-full rounded-md" src="{{$map->img}}" usemap="#workmap">
                        <map name="workmap">
                            <area shape="rect" coords="84,14,155,90" alt="Computer" href="computer.htm">
                          </map>
                        
                    </x-frontend.pieces.ad_frame>
                    
                @endif

                
            </form>


        </div>



    </div>
    

    <div class="separation h-50p"></div>

</main>

<script>

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

@endsection


