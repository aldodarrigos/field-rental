@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    <script>
        $(document).ready(function() {

            let product_status = $('#product_status').val();

            payment_on_off(product_status)



                            
            $( "#up" ).click(function() {
                let number = $('#quantity').val();
                let sum = parseInt(number) + 1;
                $('#quantity').val(sum);
                console.log($('#quantity').val());
                $( "#product_quantity" ).val(sum);
                let get_price = parseFloat($("#static_price").val());
                let price_calculate = (sum * get_price).toFixed(2);
                $( "#product_price" ).val(price_calculate);
            });

            $( "#down" ).click(function() {
                let number = $('#quantity').val();
                let res = parseInt(number) - 1;
                let validate = (res < 1)?1:res;
                $('#quantity').val(validate);
                $( "#product_quantity" ).val(validate);
                console.log($('#quantity').val());

                let get_price = parseFloat($("#static_price").val());
                let price_calculate = (validate * get_price).toFixed(2);
                $( "#product_price" ).val(price_calculate);
            });

            $( ".size" ).click(function() {
                $( ".size" ).removeClass("bg-red");
                $( ".size" ).removeClass("text-white");
                $(this).toggleClass("bg-red text-white");
                let size_value = $(this).html()
                $( "#product_size" ).val(size_value);
                
            });
            

                        
        });

        function payment_on_off(signal){

            if(signal == 1){
                $('#buttonrental').prop('disabled', false);
                $('#buttonrental').removeClass("bg-graytext");
                $('#buttonrental').addClass("bg-red");
            }else{
                $('#buttonrental').prop('disabled', true);
                $('#buttonrental').addClass("bg-graytext");
                $('#buttonrental').removeClass("bg-red");
            }

        }

    </script>

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
            
            
            <div class="uppercase text-lg font-semibold text-black mb-6">
                <span>Availability:</span> <span class="text-red">In Stock</span>
            </div>

            <div class="uppercase text-md font-semibold text-black mb-6">
                <span class="mr-3">Size:</span> 
                <span class="text-black">
                    <span class="size border-2 border-graysoft px-3 py-1 cursor-pointer rounded-lg">S</span>
                    <span class="size border-2 border-graysoft px-3 py-1 cursor-pointer rounded-lg">M</span>
                    <span class="size border-2 border-graysoft px-3 py-1 cursor-pointer rounded-lg bg-red text-white">L</span>
                    <span class="size border-2 border-graysoft px-3 py-1 cursor-pointer rounded-lg">XL</span>
                    <span class="size border-2 border-graysoft px-3 py-1 cursor-pointer rounded-lg">2XL</span>
                </span>
            </div>

            <div class="uppercase text-lg font-semibold text-black mb-6">
                <span class="mr-3">Quantity:</span> 
                <span>
                    <span class="" id='down'><i class="fas fa-minus text-base cursor-pointer px-1 py-1" ></i></span>
                    <input type="text" value="1" min="1" id='quantity' class="w-40p text-center mx-1 text-base py-1 border-2 border-graysoft rounded-lg">
                    <span class="" id='up'><i class="fas fa-plus text-base cursor-pointer  px-1 py-1" ></i></span>
                </span>
            </div>

            <form action="">

                <input type="hidden" name="static_price" id='static_price' value="{{$product->price}}">
                <input type="hidden" name="product_id" id='product_id' value="{{$product->id}}">
                <input type="hidden" name="product_price" id='product_price' value="{{$product->price}}">
                <input type="hidden" name="product_size" id='product_size' value="L">
                <input type="hidden" name="product_status" id='product_status' value="{{$product->status}}">
                <input type="hidden" name="product_quantity" id='product_quantity' value="1">

            </form>





            <x-frontend.buttons.form>
                <x-slot name='bg'>graytext</x-slot>
                <x-slot name='size'>big</x-slot>
                <x-slot name='text'>Confirm and Pay</x-slot>
                <x-slot name='class'></x-slot>
                <x-slot name='id'>buttonrental</x-slot>
                <x-slot name='on_off'></x-slot>
            </x-frontend.buttons.form>
        </div>





    </article>

    <div>
        {{$product->content}}
    </div>
    
    <div class="separation h-50p"></div>

</div>

@endsection


