@props(['link' => '/', 'size' => 'regular'])

@php
    $height = '2';
    $fontSize = 'sm';
    $px = '4';

    if($size == 'big'){
        $height = '3';
        $fontSize = 'lg';
        $px = '8';
    }
@endphp

<a href="{{$link}}" class='bg-red text-gray font-bold rounded py-{{$height}} px-{{$px}} uppercase text-{{$fontSize}} hover:bg-deepblue ease-in-out duration-300'>{{$slot}}</a>