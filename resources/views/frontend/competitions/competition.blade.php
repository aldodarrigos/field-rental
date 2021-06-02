@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    
    <script>
        $(document).ready(function(){

            $('#post_content').each(function(){
                // Get the content
                var str = $(this).html();
                // Set the regex string


                var regex = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|].(?:jpg|gif|png|webp))/ig;

                // Replace plain text links by hyperlinks
                var replaced_text = str.replace(regex, "<img src='$1' class='max-w-full border-8 border-gray mx-auto'>");
                // Echo link
                $(this).html(replaced_text);
            });
        });
    </script>

@endsection

@php
    $competition_title = ($competition->is_league == 1)?'Leagues':'Tournaments';
@endphp

<x-frontend.pieces.section_header title='{{$competition_title}}' bread='{{$competition->name}}'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">
    
    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8  ">
            
            <section class="bg-white mb-8 rounded-lg">

                <div class="h-auto md:h-400p">
                    <img class="object-cover w-full h-full rounded-t-lg" src="{{$competition->img}}" alt="">
                </div>

                <div class="p-8">
                    <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-3">{{$competition->name}}</h1>
    
                    <div class="mb-8">
                       <span class="text-sm text-black font-bold">{{$competition->pub_date}}</span>
                    </div>
        
                    <div class="mb-8" id="post_content">
                            {!!$competition->content!!}
                    </div>
                    <br>

                    @if (isset(Auth::user()->name))

                        @if ($competition->status == '2')
                            
                            @if ($competition->trials == 0)

                                <div class="text-center">
                                    <a href='/team-registration/{{$competition->id}}/{{$competition->slug}}' class="font-roboto text-gray font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue ease-in-out duration-300 bg-red "><i class="fas fa-users"></i> Register here</a>
                                </div>

                            @else

                                <div class="text-center">
                                    <a href='/tryout-registration/{{$competition->id}}/{{$competition->slug}}' class="font-roboto text-gray font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue ease-in-out duration-300 bg-red "><i class="fas fa-users"></i> Register here</a>
                                </div>
                                
                            @endif

                        @endif

                    @else

                        <div class="text-center mb-6">
                            Do you want to register? <a class="font-bold text-red" href="/signin">login</a> to your account or <a class="font-bold text-red" href="/signup">create</a> a new account
                        </div>

                    @endif

                    <br>
                   
                </div>

            </section>
            
            <section class="p-8">
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                @if ($message = Session::get('success'))
                <script>
                    Swal.fire({
                    title: 'Message sent!',
                    text: 'Thank you for you message. We will get in touch with you shortly.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    showConfirmButton: false,
                    })
                </script>
                @endif

                @php
                    $type = ($competition->is_league == 0)?'Tournament':'League';
                @endphp
                <h2 class="font-roboto text-2x uppercase font-bold text-black leading-none mb-3">Do you have any questions about this {{$type}}?</h2>

                <form class="mt-6" action="{{route('competitions.contact')}}" method="POST">

                    @csrf

                    <div class="flex justify-between gap-3 flex-col md:flex-row mb-2 md:mb-0">

                    <input type="hidden" name="competition_id" value='{{$competition->id}}'>
                    <input type="hidden" name="is_league" value='{{$competition->is_league}}'>
                    <input type="hidden" name="slug" value='{{$competition->slug}}'>

                    <span class="w-2/2 md:w-1/2">
                        <x-frontend.forms.input_text>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Name</x-slot>
                            <x-slot name='id'>f_name</x-slot>
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

                    <span class="w-2/2 md:w-1/2">
                        <x-frontend.forms.input_text>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Phone</x-slot>
                            <x-slot name='id'>phone</x-slot>
                            <x-slot name='default'></x-slot>
                            <x-slot name='placeholder'>Your phone</x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>off</x-slot>
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
                        <x-slot name='max'></x-slot>
                    </x-frontend.forms.textarea>


                    <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none rounded-md">
                    SEND
                    </button>

                </form>
            </section>

        </main>
        
        <aside class="col-span-12 md:col-span-4">

            <!--
            <livewire:frontend.aside-ad></livewire:frontend.aside-ad>
            <livewire:frontend.aside-tournament></livewire:frontend.aside-tournament>
            <livewire:frontend.aside-nextmatch></livewire:frontend.aside-nextmatch>
            -->
            
            <livewire:frontend.location-info></livewire:frontend.location-info>

            <livewire:frontend.location-map></livewire:frontend.location-map>

        </aside>
    </div>
    
</div>

@endsection


