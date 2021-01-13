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
                $reservation = session()->get('reservation');
                $field = session()->get('field');
                $user = session()->get('user');
                //print_r($reservation);

                if($field->tag_id == 1){
                    $field_players_number = '5 x 5 Players';
                }else if($field->tag_id == 2){
                    $field_players_number = '7 x 7 Players';
                }
            @endphp

            <x-frontend.cards.reservation_succes>
                
                <x-slot name='image'>{{$field->img_md}}</x-slot>


                <x-slot name='subtitle'>{{$field_players_number}}</x-slot>
                <x-slot name='title'>{{$field->name}}</x-slot>
                <x-slot name='date'>{{$reservation->res_date}}</x-slot>
                <x-slot name='hour'>{{$reservation->hour}}</x-slot>
                <x-slot name='price'>{{$reservation->price}}</x-slot>
                <x-slot name='user'>{{$user->name}}</x-slot>
                <x-slot name='paypalcode'>{{$reservation->conf_code}}</x-slot>
                <x-slot name='code'>{{$reservation->code}}</x-slot>
                

            
            </x-frontend.cards.reservation_succes>
        </div>



    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


