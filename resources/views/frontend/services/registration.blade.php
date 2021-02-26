@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    <script>
        $(document).ready(function(){
            $( "iframe" ).wrap( "<div class='video-responsive'></div>" );
       });
    </script>

    

@endsection

<x-frontend.pieces.section_header title='{{$service->name}}' bread='Registration'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 bg-white rounded-lg">
            
            <div class="h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$service->img}}" alt="">
            </div>

            <div class="p-8">
                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-8"><a href="">{{$service->name}} Registration</a></h1>

                <div>

                    @if ($service->form == 1)
                        
                        <form action="/service/registration-submit" method="POST">

                            @csrf
                            <input type="hidden" name="service_id" value='{{$service->id}}'>
                            <input type="hidden" name="user_id" value='{{Auth::user()->id}}'>
                            <input type="hidden" name="email" value='{{Auth::user()->email}}'>

                            <div class="grid grid-cols-12 gap-6 mb-2">

                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>text</x-slot>
                                        <x-slot name='label'>Player Name</x-slot>
                                        <x-slot name='id'>player_name</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'>Player Name</x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
                                <div class="col-span-12 md:col-span-6">

                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>date</x-slot>
                                        <x-slot name='label'>Date of bird</x-slot>
                                        <x-slot name='id'>dob</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'>Pick a Date</x-slot>
                                        <x-slot name='autocomplete'>on</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                    
                                </div>

                            </div>

                            <div class="grid grid-cols-12 gap-6 mb-2">

                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_select>
                                        <x-slot name='label'>Gender</x-slot>
                                        <x-slot name='id'>gender</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>off</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
            
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                        
                                    </x-frontend.forms.input_select>
                                </div>
        
                            </div>
                            
                            <x-frontend.forms.input_text>
                                <x-slot name='type'>text</x-slot>
                                <x-slot name='label'>Address</x-slot>
                                <x-slot name='id'>address</x-slot>
                                <x-slot name='default'></x-slot>
                                <x-slot name='placeholder'>Address</x-slot>
                                <x-slot name='autocomplete'>off</x-slot>
                                <x-slot name='required'>on</x-slot>
                                <x-slot name='height'>big</x-slot>
                                <x-slot name='bg'>light</x-slot>
                                <x-slot name='label_on_off'>on</x-slot>
                                <x-slot name='disable'>off</x-slot>
                            </x-frontend.forms.input_text>

                            <div class="grid grid-cols-12 gap-6 mb-2">

                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>text</x-slot>
                                        <x-slot name='label'>City</x-slot>
                                        <x-slot name='id'>city</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>number</x-slot>
                                        <x-slot name='label'>Zip</x-slot>
                                        <x-slot name='id'>zip</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
        
                            </div>

                            <div class="grid grid-cols-12 gap-6 mb-2">

                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>number</x-slot>
                                        <x-slot name='label'>Phone Home</x-slot>
                                        <x-slot name='id'>phone_home</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>number</x-slot>
                                        <x-slot name='label'>Cell</x-slot>
                                        <x-slot name='id'>phone_cell</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
        
                            </div>

                            <div class="grid grid-cols-12 gap-6 mb-2">

                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>text</x-slot>
                                        <x-slot name='label'>Grade</x-slot>
                                        <x-slot name='id'>grade</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_select>
                                        <x-slot name='label'>Tee Shirt Size</x-slot>
                                        <x-slot name='id'>tshirt_size</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>off</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
            
                                        <option value="YS">YS</option>
                                        <option value="YM">YM</option>
                                        <option value="YL">YL</option>
                                        <option value="AS">AS</option>
                                        <option value="AM">AM</option>
                                        <option value="AL">AL</option>
                                        
                                    </x-frontend.forms.input_select>
                                </div>
        
                            </div>


                            <div class="grid grid-cols-12 gap-6 mb-2">

                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>text</x-slot>
                                        <x-slot name='label'>Emergency contact</x-slot>
                                        <x-slot name='id'>emergency_contact</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>number</x-slot>
                                        <x-slot name='label'>Emergency Phone</x-slot>
                                        <x-slot name='id'>emergency_phone</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>

                            </div>

                            <x-frontend.forms.textarea>
                                <x-slot name='label'>Known allergies or other pertinent medical information</x-slot>
                                <x-slot name='id'>obs</x-slot>
                                <x-slot name='placeholder'></x-slot>
                                <x-slot name='autocomplete'>on</x-slot>
                                <x-slot name='required'>on</x-slot>
                                <x-slot name='max'>120</x-slot>
                            </x-frontend.forms.textarea>

                            <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none rounded-md">Register
                            </button>

                        </form>

                    @endif

                </div>


            <br>


            </div>

        </main>
        
        <aside class="col-span-12 md:col-span-4">
            
            <!--
            <livewire:frontend.aside-tournament></livewire:frontend.aside-tournament>
            <livewire:frontend.aside-nextmatch></livewire:frontend.aside-nextmatch>
            -->

            <livewire:frontend.location-info></livewire:frontend.location-info>

            <livewire:frontend.location-map></livewire:frontend.location-map>

        </aside>
    </div>
    
</div>

@endsection


