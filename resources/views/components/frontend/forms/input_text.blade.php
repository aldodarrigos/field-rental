@php
    $required = ($required == 'on')?'required':'';

    $py = 3;
    $bgc = 'gray-200';
    $round = 'lg';
    $t_color = 'black';

    if($height == 'slim'){
        $py = 1;
        $round = 'md';
    }
    if($bg == 'dark'){
        $bgc = 'blue';
        $t_color = 'white';
    }

@endphp

<div class="mb-2">
    @if ($label_on_off == 'on')
    <label for="{{$id}}" class="block text-xs font-semibold text-gray-600 uppercase">{{$label}}</label>
    @endif
    
    <input id="{{$id}}" type="{{$type}}" name="{{$id}}" placeholder="{{$placeholder}}" autocomplete="{{$autocomplete}}" value='{{$default}}' class="block w-full px-3 py-{{$py}} mt-2 text-{{$t_color}} bg-{{$bgc}} px-2 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-{{$round}}" {{$required}}>
</div>