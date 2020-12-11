<div class="w-boxed mx-auto flex rounded-lg">
    <div class="w-1/2">
        <img class="object-cover w-full h-full rounded-l-lg" src="{{$image}}" alt="">
    </div>
    <div class="w-1/2 bg-{{$bg}} text-white px-20 py-16 rounded-r-lg">
        <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
        <div class="text-white font-roboto text-3xl uppercase font-bold leading-none mb-4 mt-2">{{$title}}</div>
        <div class="text-graytext mb-6">
            {{$sumary}}
        </div>
        <x-frontend.buttons.calltoaction link='/' size='regular'>{{$link_text}}</x-frontend.buttons.calltoaction>
    </div>
</div>