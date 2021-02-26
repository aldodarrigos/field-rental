@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    
@endsection

<x-frontend.pieces.section_header title='Contact' bread='Contact Us'></x-frontend.pieces.section_header>

<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-12 gap-8">

        <section class="col-span-12 md:col-span-8">

            @if ($message = Session::get('success'))
            <div class="w-full py-3 mt-6 px-4 font-medium tracking-widest text-white uppercase bg-info shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none rounded-md">
                {{ $message }}
            </div>
            @endif

            <form class="mt-6" action="{{route('frontend.contact.send')}}" method="POST">

                @csrf

                <div class="flex justify-between gap-3 flex-col md:flex-row mb-2 md:mb-0">

                  <span class="w-2/2 md:w-1/2">
                    <x-frontend.forms.input_text>
                        <x-slot name='type'>text</x-slot>
                        <x-slot name='label'>Name</x-slot>
                        <x-slot name='id'>name</x-slot>
                        <x-slot name='default'></x-slot>
                        <x-slot name='placeholder'>Your Name</x-slot>
                        <x-slot name='autocomplete'>off</x-slot>
                        <x-slot name='required'>on</x-slot>
                        <x-slot name='height'>big</x-slot>
                        <x-slot name='bg'>light</x-slot>
                        <x-slot name='label_on_off'>on</x-slot>
                        <x-slot name='disable'>off</x-slot>
                    </x-frontend.forms.input_text>
                  </span>

                  <span class="w-2/2 md:w-1/2">
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
                        <x-slot name='disable'>off</x-slot>
                    </x-frontend.forms.input_text>
                  </span>
                  
                </div>
            
                <x-frontend.forms.textarea>
                    <x-slot name='label'>Message</x-slot>
                    <x-slot name='id'>message</x-slot>
                    <x-slot name='placeholder'>Your message</x-slot>
                    <x-slot name='autocomplete'>on</x-slot>
                    <x-slot name='required'>on</x-slot>
                    <x-slot name='max'>2000</x-slot>
                </x-frontend.forms.textarea>


                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none rounded-md">
                  SEND
                </button>

            </form>
        </section>
        <aside class="col-span-12 md:col-span-4">

            <livewire:frontend.location-info></livewire:frontend.location-info>

            <livewire:frontend.location-map></livewire:frontend.location-map>

        </aside>
        
    </div>




    <div class="separation h-50p"></div>

</main>

@endsection


