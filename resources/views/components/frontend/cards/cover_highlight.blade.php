<div class="rounded-lg">
    <div class="h-250p relative">
        <img class="object-cover w-full h-full rounded-t-lg" src="{{$image}}" alt="">

        <div class="absolute top-4 left-4"><x-frontend.buttons.tags>{{$tag}}</x-frontend.buttons.tags></div>
        
    </div>
    <div class="bg-{{$bg}} text-white px-10 py-7 rounded-b-lg min-h-400p">
        <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
        <h1 class="text-{{$title_color}} font-roboto text-3xl uppercase font-bold leading-none mb-4 mt-2">{{$title}}</h1>
        <div class="text-{{$sumary_color}} mb-6">
            {{$sumary}}
        </div>
        <x-frontend.buttons.link>
            <x-slot name='link'>{{$link}}</x-slot>
            <x-slot name='size'>regular</x-slot>
            {{$link_text}}
        </x-frontend.buttons.link>
        
    </div>
</div>
