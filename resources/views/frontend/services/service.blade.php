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

<x-frontend.pieces.section_header title='{{$service->name}}' bread='Services'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 rounded-lg">
            
            <div class="h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$service->img}}" alt="">
            </div>

            <div class="p-8 bg-white rounded-b-lg">
                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-3"><a href="">{{$service->name}}</a></h1>

            <div class="mb-6">{!!$service->content!!}</div>

            <br>
            
            @if (isset(Auth::user()->name))

                @if ($service->form != 0)
                    <div class="text-center mb-6">
                        <a href='/service/registration/{{$service->id}}' class="font-roboto text-gray font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue ease-in-out duration-300 bg-red"><i class="fas fa-sign-in-alt"></i> Go to register</a>
                    </div>
                @endif

                @else
                    <div class="text-center mb-6">
                        Do you want to register? <a class="font-bold text-red" href="/signin">login</a> to your account or <a class="font-bold text-red" href="/signup">create</a> a new account
                    </div>
                @endif

            </div>

            <br>

            <div class="p-6">
                @if ($slug == 'tournaments')
                    @if (count($competitions)>0)
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
                    @endif


                @endif

                @if ($slug == 'leagues')
                    @if (count($competitions)>0)
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
                    @endif


            @endif
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


