
<div class="bg-blue">
    <div class=" h-screen relative">
        <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1510051640316-cee39563ddab" alt="">
        <div class="absolute bottom-0 w-full h-full z-10" style='background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, black 100%);'></div>
        <div class="w-boxed mx-auto ">
            <div class="bigtext absolute top-48 md:top-1/3 w-full md:w-1/2 z-20 px-4 sm:px-0">
                <div class="text-red font-bold text-2x5 md:text-3x5 uppercase leading-none md:leading-1">Pre opening</div>
                <div class="text-white font-bold text-3x md:text-4x5 uppercase leading-none mb-6">Be part of our <br> pre opening ...</div>
                <div class="calltoaction">
                    <x-frontend.buttons.calltoaction link='/payment' size='big' >Register</x-frontend.buttons.calltoaction>
                </div>
            </div>

        </div> 
        
        <div class="w-11/12 md:w-boxed flex flex-col md:flex-row gap-4 absolute z-20 bottom-0 left-0 right-0 ml-auto mr-auto mx-auto bg-deepblue text-white py-4 px-4 border-lines border-b-8 rounded-t-lg">

            <div class="w-3/3 md:w-1/3 flex gap-4 border-0 md:border-r border-lines items-center ">
                <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">01</div>
                <div class="pr-4 w-full">
                    <small class="text-red text-xs uppercase">Players number</small>
                    <div>                    
                        <x-frontend.forms.input_select>
                            <x-slot name='label'>Firstname</x-slot>
                            <x-slot name='id'>firstname</x-slot>
                            <x-slot name='height'>slim</x-slot>
                            <x-slot name='bg'>dark</x-slot>
                            <x-slot name='label_on_off'>off</x-slot>
    
                            <option value="0" selected>Players number</option>
                            <option value="1">Field 01</option>
                            <option value="2">Field 02</option>
                            <option value="3">Field 03</option>
                        </x-frontend.forms.input_select>
                    </div>
                </div>
            </div>

            <div class="w-3/3 md:w-1/3 flex gap-4 border-0 md:border-r border-lines items-center">
                <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">02</div>
                <div class="w-full pr-4">
                    <small class="text-red text-xs uppercase">Pick a flied</small>
                    <x-frontend.forms.input_select>
                        <x-slot name='label'>Firstname</x-slot>
                        <x-slot name='id'>firstname</x-slot>
                        <x-slot name='height'>slim</x-slot>
                        <x-slot name='bg'>dark</x-slot>
                        <x-slot name='label_on_off'>off</x-slot>

                        <option value="0" selected>Pick a Field</option>
                        <option value="1">Field 01</option>
                        <option value="2">Field 02</option>
                        <option value="3">Field 03</option>
                    </x-frontend.forms.input_select>
                    
                </div>
            </div>

            <div class="w-3/3 md:w-1/3 flex gap-4 items-center">
                <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">03</div>
                <div class="w-full pr-4">
                    <small class="text-red text-xs uppercase">Book and pay</small>
                    <x-frontend.forms.input_text>
                        <x-slot name='type'>date</x-slot>
                        <x-slot name='label'></x-slot>
                        <x-slot name='id'>date</x-slot>
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

    </div>
</div>
