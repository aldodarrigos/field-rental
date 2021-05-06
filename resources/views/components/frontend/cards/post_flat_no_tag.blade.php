<article class="bg-white rounded-md md:rounded-r-md flex flex-col md:flex-row mb-6">
    <header class="w-full md:w-3/5 ">
        <a href="{{$link}}"><img class="object-cover w-full h-full rounded-t-md md:rounded-tr-none md:rounded-l-md" src="{{$image}}" alt=""></a>
    </header>
    <div class="px-6 py-5 w-full md:w-2/5">
        <div class="font-roboto text-2x uppercase font-bold text-black leading-8 mb-3"><a href="{{$link}}" class="hover:text-red">{{$title}}</a></div>
        <div class="mb-3">
            <x-frontend.buttons.no_link>
                <x-slot name='size'>small</x-slot>
                <x-slot name='pointer'>cursor</x-slot>
                <x-slot name='bg'>red</x-slot>
                <x-slot name='class'></x-slot>
                <x-slot name='decoration'></x-slot>
                <x-slot name='id'></x-slot>
                <x-slot name='text'>{{$tag}}</x-slot>
                
            </x-frontend.buttons.no_link>
            <span class="text-sm text-black font-bold">{{$date}}</span>
        </div>
        <div class="text-black text-md">{{$sumary}}</div>
    </div>
</article>