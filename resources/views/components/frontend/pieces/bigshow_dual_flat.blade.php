

    @if ($order == 'image_info')

    <div class="flex flex-col md:flex-row mb-6 bg-{{$bg}} rounded-lg">
        <div class="w-2/2 md:w-1/2">
            <img class="object-cover w-full h-full rounded-t-lg md:rounded-l-lg" src="{{$image}}" alt="">
        </div>
        <div class="w-2/2 md:w-1/2 py-6 px-8 text-{{$text_color}}">
            <div class="font-bold text-xl bg-blue text-white px-4 py-1 inline-block border-l-8 border-red mb-2">{{$title}}</div>
            {{$slot}}
        </div>
    </div>

    @else
        <div class="flex flex-col-reverse md:flex-row mb-6 bg-{{$bg}} rounded-lg">
            <div class="w-2/2 md:w-1/2 py-6 px-8 text-{{$text_color}} ">
                <div class="font-bold text-xl bg-blue text-white px-4 py-1 inline-block border-l-8 border-red mb-2">{{$title}}</div>
                {{$slot}}
            </div>
            <div class="w-2/2 md:w-1/2">
                <img class="object-cover w-full h-full rounded-t-lg md:rounded-r-lg" src="{{$image}}" alt="">
            </div>
        </div>

    @endif
