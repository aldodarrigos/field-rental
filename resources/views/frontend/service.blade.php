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

        <main class="col-span-12 md:col-span-8 bg-white rounded-lg">
            
            <div class="h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$service->img}}" alt="">
            </div>

            <div class="p-8">
                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-3"><a href="">{{$service->name}}</a></h1>

               <div>
                    {!!$service->content!!}
                </div>
                
            </div>

        </main>
        
        <aside class="col-span-12 md:col-span-4">
            
            <!--
            <livewire:frontend.aside-tournament></livewire:frontend.aside-tournament>
            <livewire:frontend.aside-nextmatch></livewire:frontend.aside-nextmatch>
            -->

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


