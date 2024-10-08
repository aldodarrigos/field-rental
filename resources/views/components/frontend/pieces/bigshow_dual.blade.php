<div class="w-11/12 md:w-boxed mx-auto flex flex-col md:flex-row rounded-lg">
    <div class="w-2/2 md:w-3/5">
        <img class="object-cover w-full h-300p md:h-full rounded-l-none md:rounded-l-lg rounded-t-lg md:rounded-tr-none" src="{{$image}}" alt="">
    </div>
    <div class="w-2/2 md:w-2/5 bg-{{$bg}} text-white px-10 md:px-20 py-10 md:py-16 rounded-r-none rounded-b-lg md:rounded-r-lg md:rounded-bl-none">
        <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
        <div class="text-white font-roboto text-4x uppercase font-bold leading-none mb-4 mt-2">{{$title}}</div>
        <div class="text-gray mb-6">
            {{$sumary}}
        </div>
        <x-frontend.buttons.calltoaction link='/' size='regular'>{{$link_text}}</x-frontend.buttons.calltoaction>
    </div>
</div>