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

@php
    $competition_title = ($competition->is_league == 1)?'Leagues':'Tournaments';
@endphp

<x-frontend.pieces.section_header title='{{$competition_title}}' bread='{{$competition->name}}'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 bg-white rounded-lg">
            
            <div class="h-auto md:h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$competition->img}}" alt="">
            </div>

            <div class="p-8">
                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-3">{{$competition->name}}</h1>

                <div class="mb-8">
                    <a href="/tags/tournaments" class="font-roboto bg-red font-semibold uppercase text-white text-sm px-2 py-1 mr-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300">{{$competition_title}}</a> 
                   <span class="text-sm text-black font-bold">{{$competition->pub_date}}</span>
               </div>
    
               <div class="mb-4">
                    {!!$competition->sumary!!}
               </div>

               @if ($message = Session::get('success'))
                    <div class="bg-info px-4 py-2 rounded-md mb-6 text-white alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

               <div>
                    <form action="/registration/tryout-submit" method="POST">

                        @csrf
                        <input type="hidden" name="competition_id" value='{{$competition->id}}'>
                        <input type="hidden" name="user_id" value='{{Auth::user()->id}}'>
                        <input type="hidden" name="competition_price" value='{{$competition->price}}'>
                        <input type="hidden" name="competition_second_price" value='{{$competition->second_child_price}}'>

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

                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mb-2">
                            <div class="col-span-12 md:col-span-6">

                            </div>

                        </div>

                        <div class="line-dashed"></div>

                        @for ($i = 1; $i < 11; $i++)
                            
                            @php $label_on_off = ($i>1)?'off':'on'; @endphp

                            <div class="grid grid-cols-12 gap-4">

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
                                        <x-slot name='label_on_off'>{{$label_on_off}}</x-slot>
                                        <x-slot name='disable'>on</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>
                                <div class="col-span-12 md:col-span-4">
                                    <x-frontend.forms.input_text>
                                        <x-slot name='type'>text</x-slot>
                                        <x-slot name='label'>Name</x-slot>
                                        <x-slot name='id'>player_name_{{$i}}</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>off</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>{{$label_on_off}}</x-slot>
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
                                        <x-slot name='label_on_off'>{{$label_on_off}}</x-slot>
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
                                        <x-slot name='label_on_off'>{{$label_on_off}}</x-slot>
            
                                        <option value="0">Select</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                        
                                    </x-frontend.forms.input_select>
                                </div>
                                <div class="col-span-12 md:col-span-2">
                                    <x-frontend.forms.input_select>
                                        <x-slot name='label'>Category</x-slot>
                                        <x-slot name='id'>category_{{$i}}</x-slot>
                                        <x-slot name='default'></x-slot>
                                        <x-slot name='placeholder'></x-slot>
                                        <x-slot name='autocomplete'>off</x-slot>
                                        <x-slot name='required'>off</x-slot>
                                        <x-slot name='height'>big</x-slot>
                                        <x-slot name='bg'>light</x-slot>
                                        <x-slot name='label_on_off'>{{$label_on_off}}</x-slot>
    
                                        <option value="0">Select</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->category_id}}">{{$category->name}}</option>
                                        @endforeach
                                        
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
                                        <x-slot name='label_on_off'>{{$label_on_off}}</x-slot>
                                        <x-slot name='disable'>off</x-slot>
                                    </x-frontend.forms.input_text>
                                </div>

                            </div>

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
            </div>

        </main>

        <aside class="col-span-12 md:col-span-4">
            
            <livewire:frontend.location-info></livewire:frontend.location-info>

            <livewire:frontend.location-map></livewire:frontend.location-map>

        </aside>

    </div>
    
</div>

@endsection


