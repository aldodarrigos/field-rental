@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Shop' bread='Products'></x-frontend.pieces.section_header>

<div class="separation h-50p"></div>

<div class="w-11/12 md:w-boxed mx-auto">


    <article class="flex flex-col md:flex-row mb-6">

        <header class="w-full md:w-1/2 ">
            <a href=""><img class="object-cover w-full h-full border-4 border-graylines" src="http://gramotech.net/html/tigers/images/pro-large.jpg" alt=""></a>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href=""><img class="object-cover w-full h-full border-4 border-graylines" src="http://gramotech.net/html/tigers/images/pro-large.jpg" alt=""></a>
            </div>
        </header>

        <div class="px-6 py-5 w-full md:w-1/2 font-roboto">

            <div class="text-2x uppercase font-bold text-black leading-8 mb-3">
                <a href="/post/maxime-quos-quis-nesciunt-possimus-facere-quia" class="hover:text-red">{{$product->name}}</a>
            </div>

            <div class="mb-3">
                 <a href="/tags/news" class=" font-semibold uppercase text-red text-2x ">${{$product->price}}</a> 
            </div>

            <div class="text-black text-md mb-4">{{$product->sumary}}</div>
            
            
            <div class="uppercase text-lg font-semibold text-black mb-4">
                <span>Availability:</span> <span class="text-red">In Stock</span>
            </div>

            <div class="uppercase text-md font-semibold text-black mb-4">
                <span>Size:</span> 
                <span class="text-black">
                    <span class="border-2 border-grayhard px-2 py-1 cursor-pointer">S</span>
                    <span class="border-2 border-grayhard px-2 py-1 cursor-pointer">M</span>
                    <span class="border-2 border-grayhard px-2 py-1 cursor-pointer">L</span>
                    <span class="border-2 border-grayhard px-2 py-1 cursor-pointer">XL</span>
                    <span class="border-2 border-grayhard px-2 py-1 cursor-pointer">2XL</span>
                </span>
            </div>

            <div class="uppercase text-lg font-semibold text-black mb-4">
                <span>Quantity:</span> 
                <span><input type="text" value="1"></span>
            </div>
        </div>





    </article>

    <div>
        {{$product->content}}
    </div>
    
    <div class="separation h-50p"></div>

</div>

@endsection


