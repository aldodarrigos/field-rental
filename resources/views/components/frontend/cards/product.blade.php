<article class="rounded-lg bg-white rounded-t-lg border-4 border-graylines relative">

    @if ($offer != '0.00')
        <span class="absolute top-0 right-2 text-warning text-2x5"><i class="far fa-bookmark"></i></span>
    @endif

    <header class="h-250p">
        <a href="{{$button_link}}"><img class="object-cover w-full h-full " src="{{$image}}" alt=""></a>

        
    </header>

    <div class="px-6 py-5 text-center">
        <div class="font-roboto text-1x3 uppercase font-bold text-softblue leading-8 mb-2 hover:text-red">
            <a href="{{$button_link}}">{{$title}}</a>
        </div>
        @if ($offer != '0.00')
            <span class="font-roboto text-black font-semibold text-xl line-through">${{$price}}</span>
            <span class="font-roboto text-red font-semibold text-1x5">${{$offer}}</span>
        @else
            <span class="font-roboto text-red font-semibold text-1x5">${{$price}}</span>
        @endif

    </div>

</article>