@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Shop' bread='Products'></x-frontend.pieces.section_header>

<div class="separation h-50p"></div>

<div class="w-11/12 md:w-boxed mx-auto">


    <div class="mb-12 grid grid-cols-1 md:grid-cols-4 gap-6">

        @foreach ($products as $product)

            <x-frontend.cards.product>
                <x-slot name='image'>{{$product->img}}</x-slot>
                <x-slot name='title'>{{$product->name}}</x-slot>
                <x-slot name='price'>{{$product->price}}</x-slot>
                <x-slot name='button_text'>Read more</x-slot>
                <x-slot name='button_link'>/shop/product/{{$product->slug}}</x-slot>
            </x-frontend.cards.product>
            
        @endforeach
        
    </div>
    
</div>

@endsection


