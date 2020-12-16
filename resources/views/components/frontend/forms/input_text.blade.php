@php
    $required = ($required == 'on')?'required':'';

    $pt = 3;
    $bgc = 'gray-200';
    $round = 'md';

    if($height == 'slim'){
        $pt = 1;
        $round = 'md';
    }
    if($bg == 'dark'){
        $bgc = 'blue';
    }

@endphp

<div class="mb-2">
    @if ($label_on_off == 'on')
    <label for="{{$id}}" class="block text-xs font-semibold text-gray-600 uppercase">{{$label}}</label>
    @endif
    
    <input id="{{$id}}" type="{{$type}}" name="{{$id}}" placeholder="{{$placeholder}}" autocomplete="{{$autocomplete}}" value='{{$default}}' class="block w-full p-{{$pt}} mt-2 text-white bg-{{$bgc}} px-2 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-{{$round}}" {{$required}}>
</div>