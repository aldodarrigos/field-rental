@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent

    <script>
        $('#reload').click(function (e){
            e.preventDefault();
            $.ajax({
                type:'GET',
                'url': 'reload-captcha',
                success: function(res){
                    $('#captcha-img').html(res.captcha)
                }

            })
        })
    </script>
    
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

                <div class="flex justify-between gap-3 flex-col md:flex-row mb-3">

                  <span class="w-2/2 md:w-1/2">
                    <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Name <span class="text-red">*</span> @error('name') <small class="text-red">({{$message}})</small>@enderror</label>
                    <input id="name" type="text" name="name" placeholder="Your Name" autocomplete="off" value="{{old('name')}}" class="block w-full px-3 py-3 mt-2 text-black bg-gray-200 px-2 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-lg">

                  </span>

                  <span class="w-2/2 md:w-1/2">

                    <div class="mb-2">
                        <label for="email" class="block text-xs font-semibold text-gray-600 uppercase">Email <span class="text-red">*</span> @error('email') <small class="text-red">({{$message}})</small>@enderror</label>
                        <input id="email" type="email" name="email" placeholder="john.doe@company.com" autocomplete="off" value="{{ old('email') }}" class="block w-full px-3 py-3 mt-2 text-black bg-gray-200 px-2 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-lg">
                    </div>

                  </span>
                  
                </div>

                <div class="flex justify-between gap-3 flex-col md:flex-row mb-6">

                    <span class="w-2/2 md:w-1/2">
                      <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Phone <span class="text-red">*</span> @error('phone') <small class="text-red">({{$message}})</small>@enderror</label>
                      <input id="phone" type="text" name="phone" placeholder="Your phone" autocomplete="off" value="{{old('phone')}}" class="block w-full px-3 py-3 mt-2 text-black bg-gray-200 px-2 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-lg">
  
                    </span>
                    
                </div>

                <div class="mb-2">
                    <label for="message" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Message <span class="text-red">*</span> @error('message') <small class="text-red">({{$message}})</small>@enderror</label>
                    <textarea cols="30" rows="8" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-md" id="message" name="message" placeholder="Your message" spellcheck="false" data-gramm="false" maxlength="2000">{{ old('message') }}</textarea>
                </div>

                <div class="px-3">Please solve the following math challenge to send this message</div>
                <div class="flex justify-between gap-3 flex-col md:flex-row mb-2 md:mb-0 px-2">
                    <span class="w-2/2 md:w-1/6">
                        
                        <div class="mt-3" id='captcha-img' >{!! Captcha::img(); !!}</div>
                        <div class="mt-2 ">
                            <span class="cursor-pointer" id="reload" class="">Reload</span>
                        </div>
                    </span>
                    <span class="w-2/2 md:w-1/6">
                        <x-frontend.forms.input_text>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Captcha</x-slot>
                            <x-slot name='id'>captcha</x-slot>
                            <x-slot name='default'></x-slot>
                            <x-slot name='placeholder'></x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>off</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>off</x-slot>
                            <x-slot name='disable'>off</x-slot>
                        </x-frontend.forms.input_text>
                    </span>
                    <span class="w-2/2 md:w-4/5">
                        @error('captcha') <small class="text-red">({{$message}})</small>@enderror
                    </span>


                    
                </div>

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


