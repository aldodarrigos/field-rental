<div class="w-11/12 md:w-boxed mx-auto flex flex-col md:flex-row rounded-lg">
    <div class="w-2/2 nd:w-1/2">
        <img class="object-cover w-full h-full rounded-l-none md:rounded-l-lg rounded-t-lg md:rounded-tr-none" src="{{$image}}" alt="">
    </div>
    <div class="w-2/2 nd:w-1/2 bg-{{$bg}} text-white px-10 md:px-20 py-16 rounded-r-none rounded-b-lg md:rounded-r-lg md:rounded-bl-none">
        <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
        <div class="text-white font-roboto text-3xl uppercase font-bold leading-none mb-4 mt-2">{{$title}}</div>
        <div class="text-graytext mb-6">
            {{$sumary}}
        </div>
        <x-frontend.buttons.calltoaction link='/' size='regular'>{{$link_text}}</x-frontend.buttons.calltoaction>
    </div>
</div>