<li class="w-full h-screen md:h-auto">
    <img class="object-cover w-full h-full" src="{{$img}}" alt="">
    <div class="absolute bottom-0 w-full h-full z-10" style='background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, black 100%);'></div>
    <div class="caption absolute w-full h-full top-0 left-0 z-20">

        <div class="w-boxed mx-auto ">
            <div class="bigtext absolute top-36 md:top-1/4 w-full md:w-1/2 z-20 px-4 sm:px-0">
                @if ($subtitle != '')
                <div class="text-red font-bold text-2x5 md:text-4x uppercase leading-none md:leading-1">{{$subtitle}}</div>
                @endif
                
                <div class="text-white font-bold text-3x md:text-6x uppercase leading-none mb-6">{{$title}}</div>
                <div class="calltoaction">
                    <x-frontend.buttons.link>
                        <x-slot name='link'>{{$button_link}}</x-slot>
                        <x-slot name='size'>big</x-slot>
                        {{$button_text}} <i class="fas fa-caret-right text-md pl-1"></i>
                    </x-frontend.buttons.link>
                </div>
            </div>

        </div> 
    </div>
</li>