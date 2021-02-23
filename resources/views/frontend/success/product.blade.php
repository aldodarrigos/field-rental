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
                $sale = session()->get('sale');
                $product = session()->get('product');
                $user = session()->get('user');
                //print_r($reservation);
            @endphp

            <x-frontend.cards.product_success>
                
                <x-slot name='subtitle'>Products</x-slot>
                <x-slot name='title'>{{$product->name}}</x-slot>
                <x-slot name='date'>{{$sale->created_at}}</x-slot>
                <x-slot name='size'>{{$sale->size}}</x-slot>
                <x-slot name='quantity'>{{$sale->quantity}}</x-slot>
                <x-slot name='price'>${{$sale->final_price}}</x-slot>
                <x-slot name='user'>{{$user->name}}</x-slot>
                <x-slot name='paypalcode'>{{$sale->payment_code}}</x-slot>
                <x-slot name='code'>{{$sale->code}}</x-slot>

            </x-frontend.cards.product_success>
        </div>



    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


