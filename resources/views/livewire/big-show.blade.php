
<div class="bg-blue">
    <div class=" h-screen relative">
        <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1510051640316-cee39563ddab" alt="">
        <div class="absolute bottom-0 w-full h-full z-10" style='background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, black 100%);'></div>
        <div class="w-boxed mx-auto ">
            <div class="bigtext absolute top-36 md:top-1/3 w-full md:w-1/2 z-20 px-4 sm:px-0">
                <div class="text-red font-bold text-2x5 md:text-4x uppercase leading-none md:leading-1">Pre opening</div>
                <div class="text-white font-bold text-3x md:text-6x uppercase leading-none mb-6">Be part of our <br> pre opening </div>
                <div class="calltoaction">
                    <x-frontend.buttons.calltoaction link='/singup' size='big' >Sing Up <i class="fas fa-caret-right text-md pl-1"></i></x-frontend.buttons.calltoaction>
                </div>
            </div>

        </div> 

        <form action="" id='auto-submit'>

        <div class="w-11/12 md:w-boxed flex flex-col md:flex-row gap-4 absolute z-20 bottom-0 left-0 right-0 ml-auto mr-auto mx-auto bg-deepblue text-white py-4 px-4 border-lines border-b-8 rounded-t-lg">

            
            <div class="w-3/3 md:w-1/3 flex gap-4 border-0 md:border-r border-lines items-center ">
                <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">01</div>
                <div class="pr-4 w-full">
                    <small class="text-red text-xs uppercase">Players number</small>
                    <div>                    
                        <x-frontend.forms.input_select>
                            <x-slot name='label'>player_number</x-slot>
                            <x-slot name='id'>player_number</x-slot>
                            <x-slot name='height'>slim</x-slot>
                            <x-slot name='bg'>dark</x-slot>
                            <x-slot name='label_on_off'>off</x-slot>
    
                            <option value="0" selected>Players number --</option>
                            <option value="1">5 x 5</option>
                            <option value="2">7 x 7</option>
                        </x-frontend.forms.input_select>
                    </div>
                </div>
            </div>

            <div class="w-3/3 md:w-1/3 flex gap-4 border-0 md:border-r border-lines items-center">
                <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">02</div>
                <div class="w-full pr-4">
                    <small class="text-red text-xs uppercase">Pick a field</small>
                    <x-frontend.forms.input_select>
                        <x-slot name='label'>field</x-slot>
                        <x-slot name='id'>field</x-slot>
                        <x-slot name='height'>slim</x-slot>
                        <x-slot name='bg'>dark</x-slot>
                        <x-slot name='label_on_off'>off</x-slot>

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
                    
                </div>
            </div>

            <div class="w-3/3 md:w-1/3 flex gap-4 items-center">
                <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">03</div>
                <div class="w-full pr-4">
                    <small class="text-red text-xs uppercase">Book your field</small>
                    <x-frontend.forms.input_text>
                        <x-slot name='type'>date</x-slot>
                        <x-slot name='label'></x-slot>
                        <x-slot name='id'>big_show_date</x-slot>
                        <x-slot name='default'>2020-12-24</x-slot>
                        <x-slot name='placeholder'>Pick a Date</x-slot>
                        <x-slot name='autocomplete'>on</x-slot>
                        <x-slot name='required'>on</x-slot>
                        <x-slot name='height'>slim</x-slot>
                        <x-slot name='bg'>dark</x-slot>
                        <x-slot name='label_on_off'>off</x-slot>
                    </x-frontend.forms.input_text>
                    
                </div>
            </div>

        </div>

        </form>

    </div>
</div>

<script>
    $("#big_show_date").change(function() {
        $("form#auto-submit").submit();
    });
</script>
