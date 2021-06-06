@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='{{$title}}' bread='Latest {{$title}}'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-4 py-8">

        <main class="col-span-12 md:col-span-8">

            @foreach ($posts as $post)
                @php

                    $slug = ($post->is_league == 0)?'tournaments':'leagues';

                    $status_txt = '';

                    foreach ($competition_status as $item) {
                        if($item->id == $post->status){
                            $status_txt = $item->name;
                        }
                    }

                @endphp
                <x-frontend.cards.post_flat>
                    <x-slot name='image'>{{$post->img}}</x-slot>
                    <x-slot name='title'>{{$post->name}}</x-slot>
                    <x-slot name='link'>/{{$slug}}/{{$post->slug}}</x-slot>
                    <x-slot name='date'></x-slot>
                    <x-slot name='sumary'>{{$post->sumary}}</x-slot>
                    <x-slot name='bg'>white</x-slot>
                    <x-slot name='tag'>{{$status_txt}}</x-slot>
                    <x-slot name='tag_link'>/{{$slug}}/{{$post->slug}}</x-slot>
                </x-frontend.cards.post_flat>
            @endforeach

        </main>
        
        <aside class="col-span-12 md:col-span-4">

            <x-frontend.pieces.ad_frame title='Location'>
                <x-slot name='frame_icon'><i class="fas fa-map-marker-alt"></i></x-slot>
                <x-slot name='bg'>blue</x-slot>

                <div class="text-lg text-red font-bold mb-2">{{$setting->location}}</div>
                <div class="text-base text-white font-semibold mb-1">{{$setting->open_admin}}</div>
                <div class="text-base text-white font-semibold mb-1">{{$setting->open}}</div>
                <div class="text-base text-white font-semibold mb-1">{{$setting->email}}</div>
                <div class="text-base text-white font-semibold mb-1">{{$setting->phone_1}}</div>
                <div class="text-base text-white font-semibold mb-1">{{$setting->phone_2}}</div>
                
            </x-frontend.pieces.ad_frame>

            <x-frontend.pieces.ad_frame title='Location'>
                <x-slot name='frame_icon'><i class="fas fa-map-marker-alt"></i></x-slot>
                <x-slot name='bg'>white</x-slot>

                <div id="map" class="h-500p w-full inline-block"></div>

                <script> 
            
                    document.addEventListener('DOMContentLoaded', function() {
                    
                    google.maps.event.addDomListener(window, 'load', init);
                    
                    function init() {
                        
                        var mapOptions = {
                            zoom: 13,
                            center: new google.maps.LatLng('{{$setting->latitude}}','{{$setting->longitude}}'), 
                            };
            
                        var mapElement = document.getElementById('map');
                        var map = new google.maps.Map(mapElement, mapOptions);
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng('{{$setting->latitude}}','{{$setting->longitude}}'),
                            map: map,
                            title: '{{$setting->location}}'
                        });
                    }   
                    
                    });
                        
                </script>
                
            </x-frontend.pieces.ad_frame>
            
        </aside>
    </div>
    
</div>

@endsection


