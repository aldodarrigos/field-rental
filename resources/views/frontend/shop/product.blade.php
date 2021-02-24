@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="{{asset('fancybox-2.1.7/source/jquery.fancybox.css?v=2.1.7')}}" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('fancybox-2.1.7/source/jquery.fancybox.pack.js?v=2.1.7')}}"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="{{asset('fancybox-2.1.7/source/helpers/jquery.fancybox-buttons.css?v=1.0.5')}}" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('fancybox-2.1.7/source/helpers/jquery.fancybox-buttons.js?v=1.0.5')}}"></script>
    <script type="text/javascript" src="{{asset('fancybox-2.1.7/source/helpers/jquery.fancybox-media.js?v=1.0.6')}}"></script>

    <script>
        $(document).ready(function() {

            $(".fancybox").fancybox();

            let product_status = $('#product_status').val();

            payment_on_off(product_status)

            let size_switch = $('#size_switch').val()

            if(size_switch == 1){
                payment_on_off(0)
            }


            
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
                let size_text = $(this).html()
                let size_id = $(this).data('id')
                $( "#product_size_id" ).val(size_id);
                $( "#product_size_text" ).val(size_text);
                payment_on_off(1)
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

        <div class="w-full md:w-1/2 ">
            <div class="mb-2">
                <a href="{{$product->img}}" class="fancybox" rel="gallery"><img class="object-cover w-full h-full border-4 border-graylines " src="{{$product->img}}" alt=""></a>
            </div>
            <div>
                <div class="grid grid-cols-4 gap-2">

                    @if ($product->img_2)
                        <a href="{{$product->img_2}}" class="fancybox" rel="gallery"><img class="object-cover w-full h-full border-4 border-graylines" src="{{$product->img_2}}" alt=""></a>
                    @endif

                    @if ($product->img_3)
                        <a href="{{$product->img_3}}" class="fancybox" rel="gallery"><img class="object-cover w-full h-full border-4 border-graylines" src="{{$product->img_3}}" alt=""></a>
                    @endif

                    @if ($product->img_4)
                        <a href="{{$product->img_4}}" class="fancybox" rel="gallery"><img class="object-cover w-full h-full border-4 border-graylines" src="{{$product->img_4}}" alt=""></a>
                    @endif

                    @if ($product->img_5)
                        <a href="{{$product->img_5}}" class="fancybox" rel="gallery"><img class="object-cover w-full h-full border-4 border-graylines" src="{{$product->img_5}}" alt=""></a>
                    @endif

                </div>
            </div>
        </div>

        <div class="px-6 py-5 w-full md:w-1/2 font-roboto">

            <div class="text-2x uppercase font-bold text-black leading-8 mb-3">
                <a href="/post/maxime-quos-quis-nesciunt-possimus-facere-quia" class="hover:text-red">{{$product->name}}</a>
            </div>

            <div class="mb-3">
                @php
                    $final_price = $product->offer;
                @endphp
                @if ($product->offer != '0.00')
                    <span class=" font-semibold uppercase text-black text-1x5 line-through">${{$product->price}}</span> 
                    <span class=" font-semibold uppercase text-red text-2x ">${{$product->offer}}</span> 
                    @php $final_price = $product->offer; @endphp
                @else
                    <span class=" font-semibold uppercase text-red text-2x ">${{$product->price}}</span> 
                @endif


                
            </div>

            <div class="text-black text-md mb-4">{{$product->sumary}}</div>
            
            
            <div class="uppercase text-lg font-semibold text-black mb-6">
                <span>Availability:</span> <span class="text-red">In Stock</span>
            </div>

            @if ($product->size_switch == 1)
            <div class="uppercase text-md font-semibold text-black mb-6">
                <span class="mr-3">Size:</span> 
                <span class="text-black">
                    @foreach ($sizes as $size)
                        <span class="size border-2 border-graysoft px-3 py-1 cursor-pointer rounded-lg" data-id='{{$size->id}}'>{{$size->name}}</span>
                    @endforeach
                </span>
            </div>
            @endif

            <div class="uppercase text-lg font-semibold text-black mb-6">
                <span class="mr-3">Quantity:</span> 
                <span>
                    <span class="" id='down'><i class="fas fa-minus text-base cursor-pointer px-1 py-1" ></i></span>
                    <input type="text" value="1" min="1" id='quantity' class="w-40p text-center mx-1 text-base py-1 border-2 border-graysoft rounded-lg">
                    <span class="" id='up'><i class="fas fa-plus text-base cursor-pointer  px-1 py-1" ></i></span>
                </span>
            </div>

            <form action="/product-payment" method="POST" id='product-payment-form'>

                {{ csrf_field() }}
                <input type="hidden" name="size_switch" id='size_switch' value="{{$product->size_switch}}">
                <input type="hidden" name="static_price" id='static_price' value="{{$final_price}}">
                <input type="hidden" name="product_name" id='product_name' value="{{$product->name}}">
                <input type="hidden" name="product_id" id='product_id' value="{{$product->id}}">
                <input type="hidden" name="product_price" id='product_price' value="{{$final_price}}">
                <input type="hidden" name="product_size_id" id='product_size_id' value="">
                <input type="hidden" name="product_size_text" id='product_size_text' value="">
                <input type="hidden" name="product_status" id='product_status' value="{{$product->status}}">
                <input type="hidden" name="product_quantity" id='product_quantity' value="1">
                @if (isset(Auth::user()->name))
                    <input type="hidden" id="user_id" name='user_id' value='{{Auth::user()->id}}'>
                @else
                    <input type="hidden" id="user_id" name='user_id' value='0'>
                @endif

                <x-frontend.buttons.form>
                    <x-slot name='bg'>graytext</x-slot>
                    <x-slot name='size'>big</x-slot>
                    <x-slot name='text'>Confirm and Pay</x-slot>
                    <x-slot name='class'></x-slot>
                    <x-slot name='id'>buttonrental</x-slot>
                    <x-slot name='on_off'></x-slot>
                </x-frontend.buttons.form>

            </form>



        </div>

    </article>

    <div>
        {!!$product->content!!}
    </div>
    
    <div class="separation h-50p"></div>

</div>

@endsection


