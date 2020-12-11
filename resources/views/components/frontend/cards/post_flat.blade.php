<article class="bg-white rounded-r-md flex mb-6">
    <header class="h-250p">
        <a href="{{$link}}"><img class="object-cover w-full h-full rounded-l-md" src="{{$image}}" alt=""></a>
    </header>
    <div class="px-6 py-5 ">
        <div class="font-roboto text-2x1 uppercase font-bold text-black leading-8 mb-3"><a href="{{$link}}" class="hover:text-red">{{$title}}</a></div>
        <div class="mb-3">
            <x-frontend.buttons.tags link='{{$tag_link}}'>{{$tag}}</x-frontend.buttons.tags>
            <span class="text-sm text-black font-bold">{{$date}}</span>
        </div>
        <div class="text-graytext text-sm">{{$sumary}}</div>
    </div>
</article>