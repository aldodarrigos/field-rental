
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

        <form action="/fieldsrental" id='auto-submit'>

        <div class="w-11/12 md:w-boxed flex flex-col md:flex-row gap-4 absolute z-20 bottom-0 left-0 right-0 ml-auto mr-auto mx-auto bg-deepblue text-white py-4 px-4 border-lines border-b-8 rounded-t-lg">

            
            <div class="w-3/3 md:w-1/3 flex gap-4 border-0 md:border-r border-lines items-center ">
                <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">01</div>
                <div class="pr-4 w-full">
                    <small class="text-red text-xs uppercase">Players number</small>
                    <div>                    
                        <x-frontend.forms.input_select>
                            <x-slot name='label'>players_number</x-slot>
                            <x-slot name='id'>players_number</x-slot>
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
                        <option value="125">Azteca</option>
                        <option value="125">Allianz Arena</option>
                        <option value="125">Soccer City</option>
                        <option value="100">Camp Nou</option>
                        <option value="100">Bombonera</option>
                        <option value="100">San Siro</option>
                        <option value="100">Maracana</option>
                        <option value="100">Da Luz</option>
                        <option value="100">Wembley</option>

                    </x-frontend.forms.input_select>
                    
                </div>
            </div>

            <div class="w-3/3 md:w-1/3 flex gap-4 items-center">
                <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">03</div>
                <div class="w-full pr-4">
                    <small class="text-red text-xs uppercase">Book your field</small>
                    <div class="flex">
                        <x-frontend.forms.input_text>
                            <x-slot name='type'>date</x-slot>
                            <x-slot name='label'></x-slot>
                            <x-slot name='id'>date</x-slot>
                            <x-slot name='default'>{{date('Y-m-d')}}</x-slot>
                            <x-slot name='placeholder'>Pick a Date</x-slot>
                            <x-slot name='autocomplete'>on</x-slot>
                            <x-slot name='required'>on</x-slot>
                            <x-slot name='height'>slim</x-slot>
                            <x-slot name='bg'>dark</x-slot>
                            <x-slot name='label_on_off'>off</x-slot>
                        </x-frontend.forms.input_text>
                        <span id='alt_check' class='bg-red h-36p font-roboto text-gray ml-2 font-bold rounded mt-2 py-2 px-2 cursor-pointer uppercase text-sm hover:bg-blue ease-in-out duration-300'>Check</span>
                    </div>
                    
                </div>
            </div>

        </div>

        </form>

    </div>
</div>

<script>
    $("#date").change(function() {
        $("form#auto-submit").submit();
    });
    $("#alt_check").click(function() {
        $("form#auto-submit").submit();
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
