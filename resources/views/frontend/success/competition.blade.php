@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Successful booking' bread='Booking'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <div class="col-span-6">
            @php
                $registration = session()->get('registration');
                //print_r($reservation);
            @endphp

            <x-frontend.cards.success_competition>
                
                <x-slot name='subtitle'>Competitions</x-slot>
                <x-slot name='title'>{{$registration->competition_name}}</x-slot>
                <x-slot name='date'>{{$registration->registration_date}}</x-slot>
                <x-slot name='team_name'>{{$registration->team_name}}</x-slot>
                <x-slot name='category'>{{$registration->category}}</x-slot>
                <x-slot name='price'>{{$registration->registration_price}}</x-slot>
                <x-slot name='user'>{{$registration->user_name}}</x-slot>
                <x-slot name='paypalcode'>{{$registration->payment_code}}</x-slot>

            </x-frontend.cards.success_competition>
        </div>



    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


