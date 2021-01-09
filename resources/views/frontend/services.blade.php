@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='OUR SERVICES' bread='Services'></x-frontend.pieces.section_header>

<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-80p"></div>
            
    <div class="mb-12 grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach ($services as $service)

            <x-frontend.cards.services>
                <x-slot name='image'>{{$service->img_md}}</x-slot>
                <x-slot name='title'>{{$service->name}}</x-slot>
                <x-slot name='sumary'>{{$service->sumary}}</x-slot>
                <x-slot name='sumary_color'>gray</x-slot>
                <x-slot name='bg'>blue</x-slot>
                <x-slot name='button_text'>Read more</x-slot>
                <x-slot name='button_link'>/services/{{$service->slug}}</x-slot>
            </x-frontend.cards.services>
            
        @endforeach
        

    </div>

    <div class="separation h-50p"></div>

</main>

@endsection


