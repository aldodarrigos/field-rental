<div class="bg-white w-11/12 mx-auto md:w-full rounded-lg md:rounded-none" >
    <div class="flex flex-col md:flex-row">
        <div class="image w-5/5 md:w-3/5">
            <img class="object-cover w-full h-full rounded-t-lg md:rounded-none" src="{{$content->img}}" alt="">
        </div>
        <div class="w-5/5 md:w-2/5 py-10 px-10 md:py-36 md:px-20">
            <div class="text-red uppercase font-roboto font-bold">{{$content->subtitle}}</div>    
            <h1 class="text-black font-roboto text-4x5 md:text-5xl uppercase font-bold leading-none mb-4 mt-2 break-all">{{$content->title}}</h1>
            <div class="mb-6 text-black">
                {{$content->content}}
            </div>
            <x-frontend.buttons.link>
                <x-slot name='link'>/{{$content->link}}</x-slot>
                <x-slot name='size'>regular</x-slot>
                Read more <i class="fas fa-plus text-xs"></i>
            </x-frontend.buttons.calltoaction>
        </div>
    </div>
</div>
