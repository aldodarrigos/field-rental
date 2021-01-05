<div class="rounded-lg">
    <div class="h-{{$image_height}} relative">
        <img class="object-cover w-full h-full rounded-t-lg" src="{{$image}}" alt="">
    </div>
    <div class="bg-{{$bg}} text-white px-10 py-7 rounded-b-lg min-h-400p">
        <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
        <h1 class="text-{{$title_color}} font-roboto text-2x5 uppercase font-bold leading-none mb-4 mt-2">{{$title}}</h1>
        <div class="text-{{$title_color}} font-roboto text-2xl uppercase font-bold leading-none mb-4 mt-2">{{$date}}</div>
        <div class="text-{{$title_color}} font-roboto text-2xl uppercase font-bold leading-none mb-4 mt-2">{{$hour}}</div>
        <div class="text-{{$title_color}} font-roboto text-2xl uppercase font-bold leading-none mb-4 mt-2">{{$price}}</div>
        <div class="text-{{$sumary_color}} mb-6">
            {{$sumary}}
        </div>

        @if (isset(Auth::user()->name))
            
            <div class="">
                <x-frontend.buttons.form>
                    <x-slot name='bg'>graytext</x-slot>
                    <x-slot name='size'>{{$button_size}}</x-slot>
                    <x-slot name='text'>{{$button_text}}</x-slot>
                    <x-slot name='class'></x-slot>
                    <x-slot name='id'>buttonrental</x-slot>
                    <x-slot name='on_off'></x-slot>
                </x-frontend.buttons.form>
                <img class="w-200p" src="https://www.goodtimesguitar.com/uploads/paypal-button-300x171.png" alt="">
            </div>

        @else

            <div>Please <a href="/user-login" class="font-bold text-red">login</a> to your account to complete booking or <a href="/singup" class="font-bold text-red">create</a> a new account</div>
            
        @endif


        
        
        
    </div>
</div>
