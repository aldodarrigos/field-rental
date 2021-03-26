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

                    @if ($service->reg_available == 1)
                        
                        <form action="/service/submit" method="POST">

                            @csrf
                            <input type="hidden" name="service_id" value='{{$service->id}}'>
                            <input type="hidden" name="price" value='{{$service->price}}'>
                            <input type="hidden" name="price_alt" value='{{$service->price_alt}}'>
                            <input type="hidden" name="user_id" value='{{Auth::user()->id}}'>
                            <input type="hidden" name="email" value='{{Auth::user()->email}}'>


                            <div class="grid grid-cols-12 gap-6 mb-2">
                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>text</x-slot>
                                        <x-slot name='label'>Registrant</x-slot>
                                        <x-slot name='id'>fullname</x-slot>
                                        <x-slot name='default'>{{Auth::user()->name}}</x-slot>
                                        <x-slot name='placeholder'>Your Name</x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>on</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
                            </div>
    
                            <div class="grid grid-cols-12 gap-6 mb-2">
                                <div class="col-span-12 md:col-span-6">
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
                                </div>
                                <div class="col-span-12 md:col-span-3">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>text</x-slot>
                                        <x-slot name='label'>City</x-slot>
                                        <x-slot name='id'>city</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'>City</x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
    
                                <div class="col-span-12 md:col-span-3">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>text</x-slot>
                                        <x-slot name='label'>Zip Code</x-slot>
                                        <x-slot name='id'>zip</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'>Zip Code</x-slot>
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
                                        <x-slot name='placeholder'>Phone Home</x-slot>
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
                                        <x-slot name='placeholder'>Cell</x-slot>
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
                                        <x-slot name='label'>Emergency contact</x-slot>
                                        <x-slot name='id'>emergency_contact</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'>Emergency contact</x-slot>
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
                                        <x-slot name='placeholder'>Emergency Phone</x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
    
                            </div>

                            <div class="line-dashed"></div>

                            @for ($i = 1; $i < 5; $i++)
                            
                                @php 

                                    $required = ($i>1)?'off':'on'; 

                                    $size_name = 6;
                                    $grade_show = 0;
                                    if($service->id == 7){
                                        $grade_show = 1;
                                        $size_name = 4;
                                    }

                                @endphp

                                <div class="grid grid-cols-12 gap-4 mb-4">

                                    <div class="col-span-12 md:col-span-1">
                                        <x-frontend.forms.input_text>
                                            <x-slot name='type'>text</x-slot>
                                            <x-slot name='label'>Num</x-slot>
                                            <x-slot name='id'>number</x-slot>
                                            <x-slot name='default'>{{$i}}</x-slot>
                                            <x-slot name='placeholder'></x-slot>
                                            <x-slot name='autocomplete'>off</x-slot>
                                            <x-slot name='required'>off</x-slot>
                                            <x-slot name='height'>big</x-slot>
                                            <x-slot name='bg'>light</x-slot>
                                            <x-slot name='label_on_off'>on</x-slot>
                                            <x-slot name='disable'>on</x-slot>
                                        </x-frontend.forms.input_text>
                                    </div>
                                    <div class="col-span-12 md:col-span-{{$size_name}}">
                                        <x-frontend.forms.input_text>
                                            <x-slot name='type'>text</x-slot>
                                            <x-slot name='label'>Name</x-slot>
                                            <x-slot name='id'>player_name_{{$i}}</x-slot>
                                            <x-slot name='default'></x-slot>
                                            <x-slot name='placeholder'></x-slot>
                                            <x-slot name='autocomplete'>off</x-slot>
                                            <x-slot name='required'>{{$required}}</x-slot>
                                            <x-slot name='height'>big</x-slot>
                                            <x-slot name='bg'>light</x-slot>
                                            <x-slot name='label_on_off'>on</x-slot>
                                            <x-slot name='disable'>off</x-slot>
                                        </x-frontend.forms.input_text>
                                    </div>
                                    <div class="col-span-12 md:col-span-1">
                                        <x-frontend.forms.input_text>
                                            <x-slot name='type'>text</x-slot>
                                            <x-slot name='label'>Age</x-slot>
                                            <x-slot name='id'>age_{{$i}}</x-slot>
                                            <x-slot name='default'></x-slot>
                                            <x-slot name='placeholder'></x-slot>
                                            <x-slot name='autocomplete'>off</x-slot>
                                            <x-slot name='required'>off</x-slot>
                                            <x-slot name='height'>big</x-slot>
                                            <x-slot name='bg'>light</x-slot>
                                            <x-slot name='label_on_off'>on</x-slot>
                                            <x-slot name='disable'>off</x-slot>
                                        </x-frontend.forms.input_text>
                                    </div>
                                    <div class="col-span-12 md:col-span-2">
                                        <x-frontend.forms.input_select>
                                            <x-slot name='label'>Gender</x-slot>
                                            <x-slot name='id'>gender_{{$i}}</x-slot>
                                            <x-slot name='default'></x-slot>
                                            <x-slot name='placeholder'></x-slot>
                                            <x-slot name='autocomplete'>off</x-slot>
                                            <x-slot name='required'>off</x-slot>
                                            <x-slot name='height'>big</x-slot>
                                            <x-slot name='bg'>light</x-slot>
                                            <x-slot name='label_on_off'>on</x-slot>
                
                                            <option value="0">Select</option>
                                            <option value="1">Female</option>
                                            <option value="2">Male</option>
                                            
                                        </x-frontend.forms.input_select>
                                    </div>
                                    <div class="col-span-12 md:col-span-2">
                                        <x-frontend.forms.input_text>
                                            <x-slot name='type'>text</x-slot>
                                            <x-slot name='label'>T-Shirt Size</x-slot>
                                            <x-slot name='id'>tshirt_{{$i}}</x-slot>
                                            <x-slot name='default'></x-slot>
                                            <x-slot name='placeholder'></x-slot>
                                            <x-slot name='autocomplete'>off</x-slot>
                                            <x-slot name='required'>off</x-slot>
                                            <x-slot name='height'>big</x-slot>
                                            <x-slot name='bg'>light</x-slot>
                                            <x-slot name='label_on_off'>on</x-slot>
                                            <x-slot name='disable'>off</x-slot>
                                        </x-frontend.forms.input_text>
                                    </div>

                                    @if ($grade_show == 1)
                                        <div class="col-span-12 md:col-span-2">
                                            <x-frontend.forms.input_text>
                                                <x-slot name='type'>text</x-slot>
                                                <x-slot name='label'>Grade</x-slot>
                                                <x-slot name='id'>grade_{{$i}}</x-slot>
                                                <x-slot name='default'></x-slot>
                                                <x-slot name='placeholder'></x-slot>
                                                <x-slot name='autocomplete'>off</x-slot>
                                                <x-slot name='required'>off</x-slot>
                                                <x-slot name='height'>big</x-slot>
                                                <x-slot name='bg'>light</x-slot>
                                                <x-slot name='label_on_off'>on</x-slot>
                                                <x-slot name='disable'>off</x-slot>
                                            </x-frontend.forms.input_text>
                                        </div>
                                    @endif

                                    <div class="col-span-12 md:col-span-12">
                                        <x-frontend.forms.input_text>
                                            <x-slot name='type'>text</x-slot>
                                            <x-slot name='label'>KNOWN ALLERGIES OR OTHER PERTINENT MEDICAL INFORMATION</x-slot>
                                            <x-slot name='id'>obs_{{$i}}</x-slot>
                                            <x-slot name='default'></x-slot>
                                            <x-slot name='placeholder'></x-slot>
                                            <x-slot name='autocomplete'>off</x-slot>
                                            <x-slot name='required'>off</x-slot>
                                            <x-slot name='height'>big</x-slot>
                                            <x-slot name='bg'>light</x-slot>
                                            <x-slot name='label_on_off'>on</x-slot>
                                            <x-slot name='disable'>off</x-slot>
                                        </x-frontend.forms.input_text>
                                    </div>

                                </div>

                                <div class="line-dashed"></div>

                            @endfor







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


