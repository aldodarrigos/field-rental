@php
    $colA = 2;
    $colB = 10;

    if($custom_grid == 'true'){
        $colA = $colSpanA;
        $colB = $colSpanB;
    }
@endphp

<div class="grid grid-cols-12 gap-4 bg-{{$bg}} rounded-lg p-6">
    <div class="col-span-12 md:col-span-{{$colA}} text-{{$icon_color}} text-center"><i class="{{$icon}} text-4x"></i></div>
    <div class="col-span-12 md:col-span-{{$colB}}">
        <div class="text-red uppercase text-base font-bold">{{$title}}</div>
    <div class="text-{{$sumary_color}} mb-4">{{$sumary}}</div>
        <div>
            @if ($button_on_off == 'true')
                <x-frontend.buttons.calltoaction link='{{$link}}' size='small'>
                    {{$link_text}}
                </x-frontend.buttons.tags>
            @endif

        </div>
    </div>
</div>

