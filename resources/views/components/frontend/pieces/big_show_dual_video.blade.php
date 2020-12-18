<div class="flex rounded-lg flex-col md:flex-row">
    <div class="w-5/5 md:w-3/5">
        <x-frontend.pieces.video_responsive>
            <x-slot name='url'>{{$video}}</x-slot>
        </x-frontend.pieces.video_responsive>
    </div>
    <div class="w-5/5 md:w-2/5 bg-{{$bg}} text-white px-10 md:px-16 py-16 rounded-b-lg md:rounded-bl-none md:rounded-r-lg">
        <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
        <div class="text-white font-roboto text-3x uppercase font-bold leading-none mb-4 mt-2">{{$title}}</div>
        <div class="text-graytext mb-6">
            {{$sumary}}
        </div>
        <x-frontend.buttons.calltoaction link='{{$link}}' size='regular'>{{$link_text}}</x-frontend.buttons.calltoaction>
    </div>
</div>