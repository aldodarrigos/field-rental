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