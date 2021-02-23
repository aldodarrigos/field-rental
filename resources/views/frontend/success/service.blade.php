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
                $service = session()->get('service');
                $user = session()->get('user');
                //print_r($reservation);
            @endphp

            <x-frontend.cards.service_success>
                
                <x-slot name='subtitle'>Services</x-slot>
                <x-slot name='title'>{{$service->name}}</x-slot>
                <x-slot name='date'>{{$registration->created_at}}</x-slot>
                <x-slot name='player_name'>{{$registration->player_name}}</x-slot>
                <x-slot name='user'>{{$user->name}}</x-slot>
                <x-slot name='paypalcode'>{{$registration->payment_code}}</x-slot>

            </x-frontend.cards.service_success>
        </div>



    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


