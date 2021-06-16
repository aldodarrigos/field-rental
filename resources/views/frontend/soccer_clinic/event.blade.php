@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent

    <script>
        $("#agree").click(function(){
            if ($('#agree').is(':checked')){
                $('#save').prop('disabled', false);
                $('#save').removeClass("bg-graytext");
                $('#save').addClass("bg-red");
            }else{
                $('#save').prop('disabled', true);
                $('#save').removeClass("bg-red");
                $('#save').addClass("bg-graytext");
            }

        });
    </script>
    

@endsection

<x-frontend.pieces.section_header title='Soccer Clinic' bread='{{$event->name}}'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 bg-white rounded-lg">
            
            <div class="h-auto md:h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$event->img}}" alt="">
            </div>

            <div class="p-8 ">
                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-3">{{$event->name}}</h1>
    
               <div class="mb-8">
                    {!!$event->content!!}
               </div>

               <h2 class="font-roboto text-2x uppercase font-bold text-black leading-none mb-6">Registration</h2>

                @if (isset(Auth::user()->name))

                    <div>
                        <form action="/soccer-clinic-registration" method="POST">

                            @csrf
                            <input type="hidden" name="event_id" value='{{$event->id}}'>
                            <input type="hidden" name="user_id" value='{{Auth::user()->id}}'>
                            <input type="hidden" name="event_price" value='{{$event->price}}'>
                            <input type="hidden" name="event_price_alt" value='{{$event->price_alt}}'>

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
                                <div class="col-span-12 md:col-span-6">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>text</x-slot>
                                        <x-slot name='label'>Email</x-slot>
                                        <x-slot name='id'>email</x-slot>
                                        <x-slot name='default'>{{Auth::user()->email}}</x-slot>
                                        <x-slot name='placeholder'></x-slot>
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
                                        <x-slot name='label'>Contact Phone</x-slot>
                                        <x-slot name='id'>phone</x-slot>
                                        <x-slot name='default'>{{Auth::user()->phone}}</x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>on</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>on</x-slot>
                                        <x-slot name='disable'>on</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
                                
                            </div>

                            <div class="line-dashed"></div>

                            @for ($i = 1; $i < 6; $i++)
                                
                                @php $required = ($i>1)?'off':'on'; @endphp

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
                                    <div class="col-span-12 md:col-span-5">
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
                                    <div class="col-span-12 md:col-span-2">
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

                            <br>

                            <div class="w-full p-3 mt-2 text-black bg-white appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-md h-300p overflow-y-auto">
                                {!!$setting->waiver!!}
                            </div>

                            <br>



                            <div class="text-center font-bold flex items-center justify-center gap-2">
                                <input type="checkbox" name="" id="agree" class="h-5 w-5 text-red"> <span class="">I agree to Katy ISC terms and conditions</span>
                            </div>
                            

                            <div class="text-center">
                                <button type="submit" id='save' class="bg-graytext px-8 py-3 mt-6 font-medium tracking-widest text-white uppercase  shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none rounded-md" disabled>Confirm registration
                                </button>
                            </div>

                        </form>
                    </div>

                    <br>

                    <div class="mt-4 text-sm">
                     {!! $setting->field_rules !!}
                    </div>

                @else

                    @include('partials.frontend.sign_in_up')

                @endif


            </div>

        </main>

        <aside class="col-span-12 md:col-span-4">
            
            <livewire:frontend.location-info></livewire:frontend.location-info>

            <livewire:frontend.location-map></livewire:frontend.location-map>

        </aside>

    </div>
    
</div>

@endsection


