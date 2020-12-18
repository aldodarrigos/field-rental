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
            <form action="" method="POST" id='bookform'>
            <x-frontend.forms.input_select>
                <x-slot name='label'>Player number</x-slot>
                <x-slot name='id'>players_number</x-slot>
                <x-slot name='height'>big</x-slot>
                <x-slot name='bg'>light</x-slot>
                <x-slot name='label_on_off'>on</x-slot>

                <option value="0" selected>Players number --</option>
                <option value="1">5 x 5</option>
                <option value="2">7 x 7</option>
            </x-frontend.forms.input_select>

            <x-frontend.forms.input_select>
                <x-slot name='label'>field</x-slot>
                <x-slot name='id'>field</x-slot>
                <x-slot name='height'>big</x-slot>
                <x-slot name='bg'>light</x-slot>
                <x-slot name='label_on_off'>on</x-slot>

                <option value="0" selected>Pick a Field --</option>

                <option value="125">9.- Azteca / Weekend</option>
                <option value="125">9.- Azteca / Night</option>
                <option value="110">9.- Azteca / Day</option>
                <option value="125">8.- Allianz Arena / Weekend</option>
                <option value="125">8.- Allianz Arena / Night</option>
                <option value="110">8.- Allianz Arena / Day</option>
                <option value="125">7.- Soccer City / Weekend</option>
                <option value="125">7.- Soccer City / Night</option>
                <option value="110">7.- Soccer City / Day</option>
                <option value="100">6.- Camp Nou / Weekend</option>
                <option value="100">6.- Camp Nou / Night</option>
                <option value="85">6.- Camp Nou / Day</option>
                <option value="100">5.- Bombonera / Weekend</option>
                <option value="100">5.- Bombonera / Night</option>
                <option value="85">5.- Bombonera / Day</option>
                <option value="100">4.- San Siro / Weekend</option>
                <option value="100">4.- San Siro / Night</option>
                <option value="85">4.- San Siro / Day</option>
                <option value="100">3.- Maracana / Weekend</option>
                <option value="100">3.- Maracana / Night</option>
                <option value="85">3.- Maracana / Day</option>
                <option value="100">2.- Da Luz / Weekend</option>
                <option value="100">2.- Da Luz / Night</option>
                <option value="85">2.- Da Luz / Day</option>
                <option value="100">1.- Wembley / Weekend</option>
                <option value="100">1.- Wembley/Night</option>
                <option value="85">1.- Wembley / Day</option>

            </x-frontend.forms.input_select>

            <x-frontend.forms.input_text>
                <x-slot name='type'>date</x-slot>
                <x-slot name='label'>Pick a Date</x-slot>
                <x-slot name='id'>date</x-slot>
                <x-slot name='default'>2020-12-24</x-slot>
                <x-slot name='placeholder'>Pick a Date</x-slot>
                <x-slot name='autocomplete'>on</x-slot>
                <x-slot name='required'>on</x-slot>
                <x-slot name='height'>big</x-slot>
                <x-slot name='bg'>light</x-slot>
                <x-slot name='label_on_off'>on</x-slot>
            </x-frontend.forms.input_text>

            <div class="text-right py-4">
                <x-frontend.buttons.calltoaction link='/' size='big'>Check now <i class="fas fa-check text-md pl-1"></i></x-frontend.buttons.calltoaction>
            </div>
            </form>
            
            
        </div>
        <div class="col-span-6">
            <form action="" method="POST" id='bookform'>
            <x-frontend.cards.field_booking>
                
                <x-slot name='image'>https://images.unsplash.com/photo-1531861218190-f90c89febf69</x-slot>
                <x-slot name='image_height'>250p</x-slot>
                <x-slot name='tag'>7x7 players</x-slot>
                <x-slot name='bg'>blue</x-slot>

                <x-slot name='subtitle'>7 x 7 players</x-slot>
                <x-slot name='title'>Allianz Arena</x-slot>
                <x-slot name='date'><span>Date:</span> 2020-12-24</x-slot>
                <x-slot name='hour'><span>Hour:</span> <span id='day_hour'></span></x-slot>
                <x-slot name='title_color'>white</x-slot>

                <x-slot name='sumary'>

                    <input type="hidden" id="dayselected" value=''>

                    <div class="inline-flex flex-wrap gap-2">

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>red</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>09:00</x-slot>
                            <x-slot name='class'>dummyclass</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-pointer</x-slot>
                            <x-slot name='decoration'></x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>red</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>11:00</x-slot>
                            <x-slot name='class'>dummyclass</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-pointer</x-slot>
                            <x-slot name='decoration'></x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>graytext</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>12:00</x-slot>
                            <x-slot name='class'>reservedday</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-not-allowed</x-slot>
                            <x-slot name='decoration'>line-through</x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>red</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>13:00</x-slot>
                            <x-slot name='class'>dummyclass</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-pointer</x-slot>
                            <x-slot name='decoration'></x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>red</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>14:00</x-slot>
                            <x-slot name='class'>dummyclass</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-pointer</x-slot>
                            <x-slot name='decoration'></x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>graytext</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>15:00</x-slot>
                            <x-slot name='class'>reservedday</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-not-allowed</x-slot>
                            <x-slot name='decoration'>line-through</x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>red</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>16:00</x-slot>
                            <x-slot name='class'>dummyclass</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-pointer</x-slot>
                            <x-slot name='decoration'></x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>red</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>17:00</x-slot>
                            <x-slot name='class'>dummyclass</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-pointer</x-slot>
                            <x-slot name='decoration'></x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>red</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>18:00</x-slot>
                            <x-slot name='class'>dummyclass</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-pointer</x-slot>
                            <x-slot name='decoration'></x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>red</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>19:00</x-slot>
                            <x-slot name='class'>dummyclass</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-pointer</x-slot>
                            <x-slot name='decoration'></x-slot>
                        </x-frontend.buttons.no_link>

                        <x-frontend.buttons.no_link>
                            <x-slot name='bg'>red</x-slot>
                            <x-slot name='size'>regular</x-slot>
                            <x-slot name='text'>20:00</x-slot>
                            <x-slot name='class'>dummyclass</x-slot>
                            <x-slot name='id'>dummy_id</x-slot>
                            <x-slot name='pointer'>cursor-pointer</x-slot>
                            <x-slot name='decoration'></x-slot>
                        </x-frontend.buttons.no_link>

                    </div>

                    <script>

                        $(document).ready(function() {
                            $('#buttonrental').prop('disabled', true);
                        });

                        $(".dummyclass").click(function(){
                            $(".dummyclass").removeClass('bg-info');
                            $(this).toggleClass("bg-info");
                            let day = $(this).text();
                            $('#dayselected').val(day);
                            $('#day_hour').text(day);
                            $('#buttonrental').toggleClass("bg-graytext");
                            $('#buttonrental').toggleClass("bg-red");

                            if($('#dayselected').val() != '') {
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
                <x-slot name='button_text'>Confirm and Pay <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
                <x-slot name='button_size'>big</x-slot>

            
            </x-frontend.cards.field_booking>
            </form>


        </div>



    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


