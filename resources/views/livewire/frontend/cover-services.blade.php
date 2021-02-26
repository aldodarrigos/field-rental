<div class="w-11/12 md:w-boxed mx-auto">
    
    <x-frontend.pieces.cover_title>
        <x-slot name='subtitle'>{{$content->subtitle}}</x-slot>
        {{$content->title}}
    </x-frontend.pieces.cover_title>

    <div class="mb-12 grid grid-cols-1 md:grid-cols-3 gap-4">

        @foreach ($services as $service)

            <div class="flex gap-4 bg-white px-4 py-4 rounded-lg shadow">
                <div class="w-1/4 text-right"><i class="{{$service->icon}} text-4x5 text-black"></i></div>
                <div class="w-3/4">
                    <div class="text-red uppercase text-base font-bold"><a href="/services/{{$service->slug}}">{{$service->name}}</a></div>
                    <div class="text-black">{{$service->sumary}}</div>
                </div>
            </div>

        @endforeach

    </div>

    <div class="text-center">
        <x-frontend.buttons.link>
            <x-slot name='link'>/services</x-slot>
            <x-slot name='size'>regular</x-slot>
            More Services <i class="fas fa-plus text-xs"></i>
        </x-frontend.buttons.link>
    </div>
</div>
