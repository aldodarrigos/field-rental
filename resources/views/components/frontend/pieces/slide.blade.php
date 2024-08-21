<li class="w-full h-screen md:h-auto relative">
    <picture>
        <source media="(max-width: 799px)" srcset="{{$img_mob}}">
        <img class="object-cover w-full h-full" src="{{$img}}" alt="Chris standing up holding his daughter Elva">
    </picture>

    @if ($no_shadow == '1')
    <div class="absolute bottom-0 w-full h-full z-10" style='background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, black 100%);'></div>
    @endif

    <div class="caption absolute w-full h-full top-0 left-0 z-20">
        <div class="w-boxed  mx-auto ">
            <div class="bigtext absolute bottom-3/6 sm:bottom-1/4 md:bottom-1/4 w-full md:w-boxed z-20 px-4 sm:px-20 text-center md:text-center">
                @if ($no_title == '1' && trim($title) !== '')
                <div class="text-white shadow-title-banner font-black text-2x5 md:text-6x uppercase leading-none mb-3 md:mb-6 font-monserrat">{{$title}}</div>
                @endif
                @if ($no_title == '1' && trim($subtitle) !== '')
                <div class="text-white bg-gradient-to-r from-blueStart to-blueEnd  p-3 rounded-md font-bold text-sm sm:mx-20  md:text-1x5 uppercase leading-none md:leading-1 font-monserrat">
                    {{$subtitle}}
                </div>
                @endif
                <div class="calltoaction mt-5 md:mt-8">
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
                <div class="alt_button absolute top-2/4 md:bottom-72 left-1/4 right-1/4 md:left-1/3 md:right-1/3 text-center">
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