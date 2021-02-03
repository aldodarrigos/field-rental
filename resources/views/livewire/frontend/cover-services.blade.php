<div class="w-11/12 md:w-boxed mx-auto">
    
    <x-frontend.pieces.cover_title>
        <x-slot name='subtitle'>{{$content->subtitle}}</x-slot>
        {{$content->title}}
    </x-frontend.pieces.cover_title>

    <div class="mb-12 grid grid-cols-1 md:grid-cols-3 gap-4">

        @foreach ($services as $service)

            @php
                $icon = 'fa-border-none';
                if($service->id == 1){ $icon = 'fas fa-border-none'; }
                else if($service->id == 2){ $icon = 'fas fa-trophy'; }
                else if($service->id == 3){ $icon = 'far fa-futbol'; }
                else if($service->id == 4){ $icon = 'far fa-user-circle'; }
                else if($service->id == 5){ $icon = 'fas fa-running'; }
                else if($service->id == 6){ $icon = 'fas fa-birthday-cake'; }
                else if($service->id == 7){ $icon = 'fas fa-child'; }
                else if($service->id == 8){ $icon = 'fas fa-video'; }
                else if($service->id == 9){ $icon = 'fas fa-users'; }
            @endphp
            
            <div class="flex gap-4 bg-white px-4 py-4 rounded-lg shadow">
                <div class="w-1/4 text-right"><i class="{{$icon}} text-4x5 text-black"></i></div>
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
