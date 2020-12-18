<article class="bg-{{$bg}} rounded-lg">
    <header class="h-250p">
        <a href="{{$button_link}}"><img class="object-cover w-full h-full rounded-t-lg" src="{{$image}}" alt=""></a>
    </header>
    <div class="px-6 py-5">
        <div class="font-roboto text-2x uppercase font-bold text-{{$sumary_color}} leading-8 mb-3 hover:text-red"><a href="{{$button_link}}">{{$title}}</a></div>
        <div class="text-graytext text-base mb-4">{{$sumary}}</div>
        <div class="mb-2 text-center md:text-left">
            <x-frontend.buttons.calltoaction link='{{$button_link}}' size='regular'>{{$button_text}}</x-frontend.buttons.calltoaction>
        </div>
    </div>
</article>