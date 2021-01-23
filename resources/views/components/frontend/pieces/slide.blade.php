<li class="w-full h-screen md:h-auto relative">
    <picture>
        <source media="(max-width: 799px)" srcset="{{$img_mob}}">
        <img class="object-cover w-full h-full" src="{{$img}}" alt="Chris standing up holding his daughter Elva">
    </picture>

    @if ($no_shadow == '1')
    <div class="absolute bottom-0 w-full h-full z-10" style='background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, black 100%);'></div>
    @endif

    <div class="caption absolute w-full h-full top-0 left-0 z-20">

        <div class="w-boxed mx-auto ">
            <div class="bigtext absolute top-16 md:top-1/6 w-full md:w-1/2 z-20 px-4 sm:px-0 text-center md:text-left">
                @if ($no_title == '1')
                <div class="text-red font-bold text-2x5 md:text-4x uppercase leading-none md:leading-1">{{$subtitle}}</div>
                @endif
                @if ($no_title == '1')
                <div class="text-white font-bold text-3x md:text-6x uppercase leading-none mb-6">{{$title}}</div>
                @endif
                <div class="calltoaction">
                    @if ($no_button == '1')
                    <x-frontend.buttons.link>
                        <x-slot name='link'>{{$button_link}}</x-slot>
                        <x-slot name='size'>big</x-slot>
                        {{$button_text}} <i class="fas fa-caret-right text-md pl-1"></i>
                    </x-frontend.buttons.link>
                    @endif
                </div>
            </div>
            @if ($bottom == '1')
                <div class="alt_button absolute bottom-94 md:bottom-72 left-1/4 right-1/4 md:left-1/3 md:right-1/3 text-center">
                    <x-frontend.buttons.link>
                        <x-slot name='link'>{{$button_link}}</x-slot>
                        <x-slot name='size'>big</x-slot>
                        {{$button_text}} <i class="fas fa-caret-right text-md pl-1"></i>
                    </x-frontend.buttons.link>
                </div>
            @endif
        </div> 
    </div>
</li>