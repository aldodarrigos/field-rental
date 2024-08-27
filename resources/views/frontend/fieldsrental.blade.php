@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <script>
        $(document).ready(function() {

            $("#fadelink").click(function(event){
                event.preventDefault();
                $("#fade").modal({
                    fadeDuration: 100
                });
            });

            $("#agree").click(function(){
                if ($('#agree').is(':checked')){
                    if($('#hourSelected').val() != '') {
                        $('#save').prop('disabled', false);
                        $('#save').removeClass("bg-graytext");
                        $('#save').addClass("bg-red");
                    }
                }else{
                    $('#save').prop('disabled', true);
                    $('#save').removeClass("bg-red");
                    $('#save').addClass("bg-graytext");
                }
            });

        });
    </script>
        
@endsection

<x-frontend.pieces.section_header title='Fields Rental' bread='Rent Now'></x-frontend.pieces.section_header>


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
                <option value="1" {{$x5selected}}>5 vs 5 players</option>
                <option value="2" {{$x7selected}}>7 vs 7 players</option>
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
                    }else if(isset($session_field) && $session_field['fieldIdSelected'] != ''){
                        $selected = ($session_field['fieldIdSelected'] == $item->id)?'selected':'';
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
                }else if(isset($session_field) && $session_field['dateSelected']){
                    $default_date = date($session_field['dateSelected']);
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
                <x-slot name='disable'>off</x-slot>
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

                <input type="hidden" id="dateSelected" name='dateSelected' value='{{$date}}'>
                <input type="hidden" id="fieldIdSelected" name='fieldIdSelected' value='{{$field->id}}'>
                <input type="hidden" id="fieldShortName" name='fieldShortName' value='{{$field->short_name}}'>
                <input type="hidden" id="fieldSelectedName" name='fieldSelectedName' value='{{$field->name}}'>
                <input type="hidden" id="bookingArray" name='bookingArray' value='0'>
                <input type="hidden" id="totalPrice" name='totalPrice' value='0.00'>

                <input type="hidden" id="hour-8" value='08:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-9" value='09:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-10" value='10:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-11" value='11:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-12" value='12:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-13" value='13:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-14" value='14:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-15" value='15:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-16" value='16:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-17" value='17:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-18" value='18:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-19" value='19:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-20" value='20:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-21" value='21:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-22" value='22:00' data-price='' data-pricealt='' data-active='0' data-althour=''>
                <input type="hidden" id="hour-23" value='23:00' data-price='' data-pricealt='' data-active='0' data-althour=''>

                @if (isset(Auth::user()->name))
                    <input type="hidden" id="userIdLogin" name='userIdLogin' value='{{Auth::user()->id}}'>
                @else
                    <input type="hidden" id="userIdLogin" name='userIdLogin' value='0'>
                @endif

                @php
                    if($field->tag_id == 1){
                        $field_players_number = '5 vs 5 Players';
                    }else if($field->tag_id == 2){
                        $field_players_number = '7 vs 7 Players';
                    }
                @endphp

                <div class="rounded-lg">

                    <div class="bg-blue text-white px-9 py-7 rounded-lg min-h-400p">

                        <div class="">
                            <div class="text-red uppercase font-roboto font-bold">{{$field_players_number}}</div>    
                            <h1 class="text-white font-roboto text-2x5 uppercase font-bold leading-none mb-2">{{$field->name}}</h1>
                            <div class="grid grid-cols-4 mb-4">
                                <div class="">

                                    <div class="font-roboto text-base uppercase font-bold leading-none px-2 py-2 border-t border-b border-l border-dotted border-softblue">Date</div>

                                    <div class="font-roboto text-base uppercase font-bold leading-none mb-2 text-warning px-2 py-2 border-b border-l border-dotted border-softblue">{{date('M d, Y', strtotime($date))}}</div>

                                </div>
                                <div class="text-center">
                                    <div class="font-roboto text-base uppercase font-bold leading-none px-2 py-2 border-t border-b border-l border-dotted border-softblue">Total</div>

                                    <div class="font-roboto text-base uppercase font-bold leading-none mb-2 text-warning px-2 py-2  border-b border-l border-dotted border-softblue">$<span id="total">0.00</span></div>
                                </div>
                                <div class="col-span-2">
    

                                    <table class="table-auto border-collapse w-full ">

                                        <thead class="">
                                          <tr class="text-sm font-medium text-gray-700 text-center border border-dotted border-softblue">
                                            <th class="font-roboto text-base uppercase font-bold leading-none mb-2 mt-2 px-2 py-2 " >Hour</th>
                                            <th class="font-roboto text-base uppercase font-bold leading-none mb-2 mt-2 px-2 py-2 border-l border-dotted border-softblue" >Price</th>
                                          </tr>
                                        </thead>
                    
                                        <tbody class="text-sm font-normal text-gray-700" id='sumary'>
                                            <tr class="hover:bg-gray-100 border border-dotted border-softblue text-base text-center text-warning">
                                                <td class="font-roboto py-1 font-bold">----</td>
                                                <td class="font-roboto py-1 font-bold border-l border-dotted border-softblue">$ 0.00</td></tr>
                                        </tbody>

                                      </table>
                                </div>


                            </div>
                        </div>

                        <div class="text-white mb-6">
                            <div class="inline-flex flex-wrap gap-2 mb-4">
                                @for ($i = 0; $i < count($hoursarray); $i++)
                                    @php
                                        if($hoursarray[$i]['class'] == 'noselect'){
                                            $color = 'bg-green button_hour text-gray';
                                            $pointer = 'cursor-pointer';
                                            $decoration = '';
                                        }else if($hoursarray[$i]['class'] == 'selected'){
                                            $color = 'bg-warning button_hour text-black';
                                            $pointer = 'cursor-pointer';
                                            $decoration = '';
                                        }else{
                                            $color = 'bg-red';
                                            $pointer = 'cursor-not-allowed';
                                            $decoration = 'line-through';
                                        }

                                        $hour_map = [
                                            '08:00' => '8 AM',
                                            '09:00' => '9 AM',
                                            '10:00' => '10 AM',
                                            '11:00' => '11 AM',
                                            '12:00' => '12 PM',
                                            '13:00' => '1 PM',
                                            '14:00' => '2 PM',
                                            '15:00' => '3 PM',
                                            '16:00' => '4 PM',
                                            '17:00' => '5 PM',
                                            '18:00' => '6 PM',
                                            '19:00' => '7 PM',
                                            '20:00' => '8 PM',
                                            '21:00' => '9 PM',
                                            '22:00' => '10 PM',
                                            '23:00' => '11 PM',
                                        ];

                                        // Obtener la hora actual del array
                                        $current_hour = $hoursarray[$i]['hour'];
                                        // Asignar el formato AM/PM usando el array asociativo
                                        $hour_fix = isset($hour_map[$current_hour]) ? $hour_map[$current_hour] : 'Unknown';

                                    @endphp
                                    <x-frontend.buttons.hour>
                                        <x-slot name='bg'>{{$color}}</x-slot>
                                        <x-slot name='text'>{{$hour_fix}}</x-slot>
                                        <x-slot name='class'>{{$hoursarray[$i]['class']}}</x-slot>
                                        <x-slot name='dataHour'>{{$hoursarray[$i]['hour']}}</x-slot>
                                        <x-slot name='dataPrice'>{{$hoursarray[$i]['price']}}</x-slot>
                                        <x-slot name='dataPriceAlt'>{{$hoursarray[$i]['price_alt']}}</x-slot>
                                        <x-slot name='dataAltHour'>{{$hour_fix}}</x-slot>
                                        <x-slot name='pointer'>{{$pointer}}</x-slot>
                                        <x-slot name='decoration'>{{$decoration}}</x-slot>
                                        <x-slot name='hover'></x-slot>
                                    </x-frontend.buttons.hour>
                                @endfor
      
                                <span class='bg-green font-roboto text-gray font-bold rounded py-1 px-2 w-80p text-center uppercase text-md hover:bg-deepblue hover:text-gray ease-in-out duration-300 cursor-pointer' id='clean'><i class="fas fa-sync"></i></span>
                 
                            </div>
    
                            <div class="flex gap-x-4 text-xs mb-2">
                                <div><span><i class="fas fa-circle text-green"></i></span> Available</div>
                                <div><span><i class="fas fa-circle text-warning"></i></span> Selected</div>
                                <div><span><i class="fas fa-circle text-red"></i></span> Not available</div>
                            </div>
        
                            <script>
                                var matrix =  []; 

                                $(document).ready(function() {
                                    $('#buttonrental').prop('disabled', true);
                                    var hoursSelected = $('.button_hour.selected');
                                    if (hoursSelected.length > 0) {
                                        hoursSelected.each(function(index, element) {
                                            sethour($(element));
                                        });    
                                        xsa();
                                    }
                                });
        
                                $(".button_hour").click(function(){

                                    if($(this).hasClass('noselect')){

                                        hour_button_switch($(this), '1')
                                        sethour($(this))
                                        xsa()
                                        
                                        $('#buttonrental').toggleClass("bg-graytext")
                                        $('#buttonrental').toggleClass("bg-red")
        
                                        if ($('#agree').is(':checked')){
                                            $('#save').prop('disabled', false)
                                            $('#save').removeClass("bg-graytext")
                                            $('#save').addClass("bg-red")
                                        }
                                    }else{
                                        hour_button_switch($(this), '0')
                                        unsethour($(this))
                                        xsa()
                                        
                                    }

                                });

                                function sethour(thisHour){
                                    let hour_text = thisHour.text();
                                    let price = thisHour.data("price")
                                    let price_alt = thisHour.data("pricealt")
                                    let hour = thisHour.data("hour")
                                    let althour = thisHour.data("althour")
                                    
                                    let hourInt = parseInt(hour.replace(':00', ''))
                                    
                                    $('#hour-'+hourInt).attr('data-price', price)
                                    $('#hour-'+hourInt).attr('data-pricealt', price_alt)
                                    $('#hour-'+hourInt).attr('data-active', 1)
                                    $('#hour-'+hourInt).attr('data-althour', althour)
                          
                                }
                                
                                function unsethour(thisHour){

                                    let hour_text = thisHour.text();
                                    let price = thisHour.data("price")
                                    let price_alt = thisHour.data("pricealt")
                                    let hour = thisHour.data("hour")

                                    let hourInt = parseInt(hour.replace(':00', ''))

                                    $('#hour-'+hourInt).attr('data-price', '')
                                    $('#hour-'+hourInt).attr('data-pricealt', '')
                                    $('#hour-'+hourInt).attr('data-active', 0)
                                    $('#hour-'+hourInt).attr('data-althour', '')
    

                                }


                                function xsa(){

                                    matrix = []
                                    matrixFinale = []
                                    for (let i = 23; i > 7; i--) {
                                        let indexhour = $('#hour-'+i)
                                        // console.log(indexhour)
                                        // console.log(indexhour.attr('data-active') == '1')
                                        if(indexhour.attr('data-active') == '1'){
                                            matrix.push([indexhour.attr('data-althour'), indexhour.attr('data-price'), indexhour.attr('data-pricealt'), indexhour.val()])
                                        }
                                    }//endfor

                                    

                                    if(matrix.length == 1){

                                        matrixFinale = []
                                        $('#sumary').html('')
                                        matrixFinale.push([matrix[0][3], matrix[0][1]])

                                        $('#sumary').append('<tr class="hover:bg-gray-100 border border-dotted border-softblue text-base text-center text-warning"><td class="font-roboto py-1 font-bold">'+matrix[0][0]+'</td><td class="font-roboto py-1 font-bold border-l border-dotted border-softblue">$ '+matrix[0][1]+'</td></tr>')

                                        $('#total').text(matrix[0][1])//Total Text
                                        $('#totalPrice').val(matrix[0][1])//Total hidden value
                                        $('#bookingArray').val(JSON.stringify(matrixFinale))

                                    }else if(matrix.length > 1){

                                        matrixFinale = []
                                        $('#sumary').html('')
                                        let sumTotal = parseFloat('0.00')

                                        for (let x = 0; x < matrix.length; x++) {

                                            if(x == 0){

                                                matrixFinale.push([matrix[x][3], matrix[x][1]])
                                                $('#sumary').append('<tr class="hover:bg-gray-100 border border-dotted border-softblue text-base text-center text-warning"><td class="font-roboto py-1 font-bold">'+matrix[x][0]+'</td><td class="font-roboto py-1 font-bold border-l border-dotted border-softblue">$ '+matrix[x][1]+'</td></tr>')
                                                
                                                sumTotal += parseFloat(matrix[x][1])
                                                $('#total').text(sumTotal.toFixed(2))//Total Text
                                                $('#totalPrice').val(sumTotal.toFixed(2))//Total hidden value
                                                $('#bookingArray').val(JSON.stringify(matrixFinale))
                                            }else{

                                                let finalPrice = (matrix[x][2] > 0)?matrix[x][2]:matrix[x][1]
                                                matrixFinale.push([matrix[x][3], finalPrice])
                                                $('#sumary').append('<tr class="hover:bg-gray-100 border border-dotted border-softblue text-base text-center text-warning"><td class="font-roboto py-1 font-bold">'+matrix[x][0]+'</td><td class="font-roboto py-1 font-bold border-l border-dotted border-softblue">$ '+finalPrice+'</td></tr>')

                                                sumTotal += parseFloat(finalPrice)
                                                $('#total').text(sumTotal.toFixed(2))//Total Text
                                                $('#totalPrice').val(sumTotal.toFixed(2))//Total hidden value
                                                $('#bookingArray').val(JSON.stringify(matrixFinale))

                                            }
                                            
                                        }

                                    }else{
                                        $('#sumary').html('')//reset table booking
                                        $('#total').text('0.00')//reset text total
                                        $('#bookingArray').val('0')//reset hidden value array
                                        $('#totalPrice').val('0.00')//reset hidden value
                                    }

                                    // console.log(matrixFinale)

                                }


                                $("#clean").click(function(){
                                    
                                    location.reload();

                                });

                                function hour_button_switch(thisObj, signal){
                                    console.log(signal)
                                    if(signal == '1'){
                                        thisObj.addClass("bg-warning");
                                        thisObj.removeClass("bg-green");
                                        thisObj.removeClass("text-gray");
                                        thisObj.addClass("text-black");
                                        thisObj.removeClass("noselect");
                                        thisObj.addClass("selected");
                                    }else{
                                        thisObj.addClass("bg-green");
                                        thisObj.removeClass("bg-warning");
                                        thisObj.removeClass("text-black");
                                        thisObj.addClass("text-gray");
                                        thisObj.removeClass("selected");
                                        thisObj.addClass("noselect");
                                    }
                                }

    
                            </script>
                        </div>

                        @if (isset(Auth::user()->name))

                            <div class="w-full p-3 mt-2 text-black bg-white appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-md h-300p overflow-y-auto">
                                {!!$setting->waiver!!}
                            </div>

                            <br>

                            <div class="text-center font-bold flex items-center justify-center gap-2">
                                <input type="checkbox" name="" id="agree" class="h-5 w-5 text-red"> <span class="">I agree to Katy ISC terms and conditions</span>
                            </div>

                            <br>
                            
                            <div>

                                <div class="text-center">
                                    <button type="submit" id='save' class=" bg-graytext font-roboto text-gray font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue ease-in-out duration-300" disabled>Confirm and Pay <i class="far fa-credit-card"></i>
                                    </button>
                                </div>

                                <img class="w-200p ml-auto mr-auto" src="https://katyisc.com/storage/files/paypal-button.png" alt="">
                                
                            </div>

                        @else

                            @include('partials.frontend.sign_in_up')
                            
                        @endif

                    </div>
                </div>
                    
                @else

                    <x-frontend.pieces.ad_frame title='{{$map->title}}'>
                        <x-slot name='frame_icon'></x-slot>
                        <x-slot name='bg'>white</x-slot>
                    
                        <img class="max-w-full rounded-md" src="{{$map->img}}" usemap="#workmap">
                        
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


