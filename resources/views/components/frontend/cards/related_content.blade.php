<article class="bg-white rounded-b-md">
    <header class="relative">
        <a href="{{$link}}"><img class="object-cover w-full h-full rounded-t-md" src="{{$image}}" alt=""></a>
    </header>
    <div class="px-6 py-5">
        <div class="font-roboto text-2x uppercase font-bold text-black leading-8 mb-2 hover:text-red"><a href="{{$link}}">{{$title}}</a></div>
        <div class="left-4 mb-2"><x-frontend.buttons.tags>{{$status}}</x-frontend.buttons.tags></div>
        <div class="text-black text-md">{{$sumary}}</div> 
    </div>
</article>