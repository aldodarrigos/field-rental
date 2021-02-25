@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Tournaments' bread='{{$competition->name}}'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 bg-white rounded-lg">
            
            <div class="h-auto md:h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$competition->img}}" alt="">
            </div>

            <div class="p-8">
                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-3">{{$competition->name}}</h1>

                <div class="mb-8">
                    <a href="/tags/tournaments" class="font-roboto bg-red font-semibold uppercase text-white text-sm px-2 py-1 mr-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300">Tournaments</a> 
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
                    <form action="/registration/submit" method="POST">

                        @csrf
                        <input type="hidden" name="competition_id" value='{{$competition->id}}'>
                        <x-frontend.forms.input_text>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Fullname</x-slot>
                            <x-slot name='id'>fullname</x-slot>
                            <x-slot name='default'></x-slot>
                            <x-slot name='placeholder'>Your Name</x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>on</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>on</x-slot>
                        </x-frontend.forms.input_text>

                        <x-frontend.forms.input_text>
                            <x-slot name='type'>email</x-slot>
                            <x-slot name='label'>Email</x-slot>
                            <x-slot name='id'>email</x-slot>
                            <x-slot name='default'></x-slot>
                            <x-slot name='placeholder'>john.doe@company.com</x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>on</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>on</x-slot>
                        </x-frontend.forms.input_text>

                        <x-frontend.forms.input_text>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Phone Number</x-slot>
                            <x-slot name='id'>phone</x-slot>
                            <x-slot name='default'></x-slot>
                            <x-slot name='placeholder'>Your phone number</x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>off</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>on</x-slot>
                        </x-frontend.forms.input_text>

                        <x-frontend.forms.input_select>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Category</x-slot>
                            <x-slot name='id'>category</x-slot>
                            <x-slot name='default'></x-slot>
                            <x-slot name='placeholder'></x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>off</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>on</x-slot>

                            <option value="0">Select category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->category_id}}">{{$category->name}}</option>
                            @endforeach
                            
                        </x-frontend.forms.input_select>

                        <x-frontend.forms.input_text>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Team name</x-slot>
                            <x-slot name='id'>team</x-slot>
                            <x-slot name='default'></x-slot>
                            <x-slot name='placeholder'>Team name</x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>off</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>on</x-slot>
                        </x-frontend.forms.input_text>

                        <x-frontend.forms.input_text>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Players number</x-slot>
                            <x-slot name='id'>number_players</x-slot>
                            <x-slot name='default'></x-slot>
                            <x-slot name='placeholder'>Players number</x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>off</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>on</x-slot>
                        </x-frontend.forms.input_text>

                        <x-frontend.forms.input_select>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Gender</x-slot>
                            <x-slot name='id'>gender</x-slot>
                            <x-slot name='default'></x-slot>
                            <x-slot name='placeholder'></x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>off</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>on</x-slot>

                            <option value="0">Select option</option>
                            <option value="1">Female</option>
                            <option value="2">Male</option>
                            
                        </x-frontend.forms.input_select>

                        <x-frontend.forms.textarea>
                            <x-slot name='label'>Message</x-slot>
                            <x-slot name='id'>message</x-slot>
                            <x-slot name='placeholder'>Your message</x-slot>
                            <x-slot name='autocomplete'>on</x-slot>
                            <x-slot name='required'>on</x-slot>
                            <x-slot name='max'>2000</x-slot>
                        </x-frontend.forms.textarea>

                        <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none rounded-md">SEND
                        </button>

                    </form>
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


