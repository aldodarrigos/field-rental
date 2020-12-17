<div class="rounded-lg">
    <div class="h-{{$image_height}} relative">
        <img class="object-cover w-full h-full rounded-t-lg" src="{{$image}}" alt="">

        <div class="absolute top-4 left-4"><x-frontend.buttons.tags>{{$tag}}</x-frontend.buttons.tags></div>
        
    </div>
    <div class="bg-{{$bg}} text-white px-10 py-7 rounded-b-lg min-h-400p">
        <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
        <h1 class="text-{{$title_color}} font-roboto text-3xl uppercase font-bold leading-none mb-4 mt-2">{{$title}}</h1>
        <div class="text-{{$sumary_color}} mb-6">
            {{$sumary}}
        </div>

        <x-frontend.buttons.form>
            <x-slot name='bg'>graytext</x-slot>
            <x-slot name='size'>{{$button_size}}</x-slot>
            <x-slot name='text'>{{$button_text}}</x-slot>
            <x-slot name='class'></x-slot>
            <x-slot name='id'></x-slot>
        </x-frontend.buttons.form>

        
    </div>
</div>
