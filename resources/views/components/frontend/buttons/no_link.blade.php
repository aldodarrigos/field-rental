@php
    $height = '2';
    $fontSize = 'sm';
    $px = '4';

    if($size == 'big'){
        $height = '3';
        $fontSize = 'lg';
        $px = '8';
    }

    if($size == 'regular'){
        $height = '1';
        $fontSize = 'lg';
        $px = '6';
    }

    if($size == 'small'){
        $height = '1';
        $fontSize = 'sm';
        $px = '2';
    }
@endphp

<span class='{{$class}} bg-{{$bg}} {{$decoration}} font-roboto text-gray font-bold rounded py-{{$height}} px-{{$px}} uppercase text-{{$fontSize}} hover:bg-deepblue ease-in-out duration-300 {{$pointer}}' id='{{$id}}'>{{$text}}</span>