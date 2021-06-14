@php
    $required = ($required == 'on')?'required':'';
@endphp
                
<div class="mb-2">
    <label for="{{$id}}" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">{{$label}}</label>
    <textarea cols="30" rows="8" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-md" id='{{$id}}' name='{{$id}}' placeholder="{{$placeholder}}" spellcheck="false" data-gramm="false" {{$required}} maxlength="{{$max}}">{{$slot}}</textarea>
</div>