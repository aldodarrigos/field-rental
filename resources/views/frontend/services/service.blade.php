@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    <script>
        $(document).ready(function(){

            getyoutubelinks()
            getlinks()

            function getyoutubelinks(){
                var str = $('#post_content').html();
                var regex = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|].(?:jpg|gif|png|webp))/ig;
                var replaced_text = str.replace(regex, "<img src='$1' class='max-w-full border-8 border-gray mx-auto'>");
                $('#post_content').html(replaced_text);
            }

            function getlinks(){
                var str = $('#post_content').html();
                var regex = /(?:https:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?.*v=)?(\w+)/g;
                var replaced_text = str.replace(regex, "<div class='video-responsive'> <iframe src='https://www.youtube.com/embed/$1' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>");
                $('#post_content').html(replaced_text);
            }

        });
    </script>

@endsection

<x-frontend.pieces.section_header title='{{$service->name}}' bread='Services'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 rounded-lg">
            
            <div class="">
                <img class="rounded-t-lg" src="{{$service->img}}" alt="">
            </div>

            <div class="p-8 bg-white rounded-b-lg">
                
                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-3"><a href="">{{$service->name}}</a></h1>

                <div id='post_content' class="text_content mb-6">
                    {!!$service->content!!}
                </div>
                

                <br>
            
                @if ($service->reg_available == 1)
                    
                    <div class="text-center">
                        <a href='/service/registration/{{$service->id}}' class="font-roboto text-gray font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue ease-in-out duration-300 bg-red "><i class="fas fa-users"></i> Registration available</a>
                    </div>

                @endif
            
                <br>

            </div>

            <!-- Summer clinics, Soccer Clinics, Soccer Skill training -->
            @if ($service->id == 5)
                
                @if (count($clinics)>0)
                    <div class="pt-6 px-2">
                        <h2 class="font-roboto text-2x uppercase font-bold text-black leading-none mb-4">Current Clinics</h2>
                
                        <section class="mb-12 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-12">

                            @foreach ($clinics as $clinic)

                                @php
                                    $status_txt = '';

                                    foreach ($competition_status as $item) {
                                        if($clinic->status == $item->id){
                                            $status_txt = $item->name;
                                        }
                                    }
                                @endphp

                                <x-frontend.cards.related_content>
                                    <x-slot name='image'>{{$clinic->img}}</x-slot>
                                    <x-slot name='title'>{{$clinic->name}}</x-slot>
                                    <x-slot name='link'>/soccer-clinic/{{$clinic->slug}}</x-slot>
                                    <x-slot name='date'></x-slot>
                                    <x-slot name='sumary'>{{$clinic->sumary}}</x-slot>
                                    <x-slot name='status'>{{$status_txt}}</x-slot>
                                </x-frontend.cards.related_content>

                            @endforeach

                        </section>
                    </div>
                @endif
            
            @endif            

            <br>

            
            @if ($slug == 'tournaments')

                @if (count($competitions)>0)
                    <div class="p-6">
                        <h2 class="font-roboto text-2x uppercase font-bold text-black leading-none mb-4">Current Tournaments</h2>
                
                        <section class="mb-12 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-12">

                            @foreach ($competitions as $competition)

                                @php
                                    $status_txt = '';

                                    foreach ($competition_status as $item) {
                                        if($competition->status == $item->id){
                                            $status_txt = $item->name;
                                        }
                                    }
                                @endphp

                                <x-frontend.cards.related_content>
                                    <x-slot name='image'>{{$competition->img}}</x-slot>
                                    <x-slot name='title'>{{$competition->name}}</x-slot>
                                    <x-slot name='link'>/tournaments/{{$competition->slug}}</x-slot>
                                    <x-slot name='date'></x-slot>
                                    <x-slot name='sumary'>{{$competition->sumary}}</x-slot>
                                    <x-slot name='status'>{{$status_txt}}</x-slot>
                                </x-frontend.cards.related_content>

                            @endforeach

                        </section>
                    </div>
                @endif

            @endif

            @if ($slug == 'leagues')
                @if (count($competitions)>0)
                    <div class="p-6">
                        <h2 class="font-roboto text-2x uppercase font-bold text-black leading-none mb-4">Current Leagues</h2>
            
                        <section class="mb-12 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-12">

                            @foreach ($competitions as $competition)

                            @php
                                $status_txt = '';

                                foreach ($competition_status as $item) {
                                    if($competition->status == $item->id){
                                        $status_txt = $item->name;
                                    }
                                }
                            @endphp

                            <x-frontend.cards.related_content>
                                <x-slot name='image'>{{$competition->img}}</x-slot>
                                <x-slot name='title'>{{$competition->name}}</x-slot>
                                <x-slot name='link'>/leagues/{{$competition->slug}}</x-slot>
                                <x-slot name='date'></x-slot>
                                <x-slot name='sumary'>{{$competition->sumary}}</x-slot>
                                <x-slot name='status'>{{$status_txt}}</x-slot>
                            </x-frontend.cards.related_content>
                            @endforeach
        
                        </section>
                    </div>
                @endif

            @endif


            <section class="p-2">
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


                <h2 class="font-roboto text-2x uppercase font-bold text-black leading-none mb-3">Do you have any questions about this service?</h2>

                <form class="mt-6" action="{{route('service.contact')}}" method="POST">

                    @csrf

                    <div class="flex justify-between gap-3 flex-col md:flex-row mb-2 md:mb-0">

                    <input type="hidden" name="service_id" value='{{$service->id}}'>

                    <span class="w-2/2 md:w-1/2">
                        <x-frontend.forms.input_text>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Name <span class="text-red">*</span> @error('f_name') <small class="text-red">({{$message}})</small>@enderror</x-slot>
                            <x-slot name='id'>f_name</x-slot>
                            <x-slot name='default'>{{old('f_name')}}</x-slot>
                            <x-slot name='placeholder'>Your Name</x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>off</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>on</x-slot>
                            <x-slot name='disable'>off</x-slot>
                        </x-frontend.forms.input_text>
                    </span>

                    <span class="w-2/2 md:w-1/2">
                        <x-frontend.forms.input_text>
                            <x-slot name='type'>email</x-slot>
                            <x-slot name='label'>Email <span class="text-red">*</span> @error('email') <small class="text-red">({{$message}})</small>@enderror</x-slot>
                            <x-slot name='id'>email</x-slot>
                            <x-slot name='default'>{{old('email')}}</x-slot>
                            <x-slot name='placeholder'>john.doe@company.com</x-slot>
                            <x-slot name='autocomplete'>off</x-slot>
                            <x-slot name='required'>off</x-slot>
                            <x-slot name='height'>big</x-slot>
                            <x-slot name='bg'>light</x-slot>
                            <x-slot name='label_on_off'>on</x-slot>
                            <x-slot name='disable'>off</x-slot>
                        </x-frontend.forms.input_text>
                    </span>

                    <span class="w-2/2 md:w-1/2">
                        <x-frontend.forms.input_text>
                            <x-slot name='type'>text</x-slot>
                            <x-slot name='label'>Phone <span class="text-red">*</span> @error('phone') <small class="text-red">({{$message}})</small>@enderror</x-slot>
                            <x-slot name='id'>phone</x-slot>
                            <x-slot name='default'>{{old('phone')}}</x-slot>
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
                        <x-slot name='label'>Message <span class="text-red">*</span> @error('message') <small class="text-red">({{$message}})</small>@enderror</x-slot>
                        <x-slot name='id'>message</x-slot>
                        <x-slot name='placeholder'>Your message</x-slot>
                        <x-slot name='autocomplete'>on</x-slot>
                        <x-slot name='required'>off</x-slot>
                        <x-slot name='max'></x-slot>
                        {{old('message')}}
                    </x-frontend.forms.textarea>

                    <div class="px-3">Please solve the following math challenge to send this message</div>
                    <div class="flex justify-between gap-3 flex-col md:flex-row mb-2 md:mb-0 px-2">
                        <span class="w-2/2 md:w-1/6">
                            
                            <div class="mt-3" id='captcha-img' >{!! Captcha::img() !!}</div>
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


