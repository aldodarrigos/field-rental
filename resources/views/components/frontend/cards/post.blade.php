<article class="bg-white rounded-b-md">
    <header class="h-250p">
        <a href="{{$link}}"><img class="object-cover w-full h-full rounded-t-md" src="{{$image}}" alt=""></a>
    </header>
    <div class="px-6 py-5 ">
        <div class="font-roboto text-2x uppercase font-bold text-black leading-8 mb-3 hover:text-red"><a href="{{$link}}">{{$title}}</a></div>
        <div class="mb-3">
            <x-frontend.buttons.tagslink>
                <x-slot name='link'>{{$tag_link}}</x-slot>
                {{$tag}}
            </x-frontend.buttons.tagslink>
            <span class="text-sm text-black font-bold">{{$date}}</span>
        </div>
        <div class="text-black text-md">{{$sumary}}</div>
    </div>
</article>