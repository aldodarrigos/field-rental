@props(['link' => '/'])

@php
    $active = ($link == '/'.Request::segment(1))?'bg-blue text-white':'text-graytext';
@endphp

<li class="mb-2 md:mb-0"><a href="{{$link}}" class='{{$active}} font-roboto font-bold uppercase  text-base px-2 py-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300'>{{$slot}}</a></li>