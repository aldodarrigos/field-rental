<div class="grid grid-cols-12 gap-4 bg-{{$bg}} rounded-lg p-6">
    <div class="col-span-2 text-{{$icon_color}}"><i class="{{$icon}} text-4x"></i></div>
    <div class="col-span-10">
        <div class="text-red uppercase text-base font-bold">{{$title}}</div>
    <div class="text-graytext mb-4">{{$sumary}}</div>
        <div>
            @if ($button_on_off == 'true')
                <x-frontend.buttons.calltoaction link='{{$link}}' size='small'>
                    {{$link_text}}
                </x-frontend.buttons.tags>
            @endif

        </div>
    </div>
</div>

