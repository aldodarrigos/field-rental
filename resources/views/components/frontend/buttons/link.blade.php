@php
    $height = '2';
    $fontSize = 'sm';
    $px = '4';

    if($size == 'big'){
        $height = '3';
        $fontSize = 'lg';
        $px = '8';
    }
    if($size == 'small'){
        $height = '1';
        $fontSize = 'sm';
        $px = '2';
    }
@endphp

<a href="{{$link}}" class='bg-red font-roboto text-gray font-bold rounded py-{{$height}} px-{{$px}} uppercase text-sm md:text-{{$fontSize}} hover:bg-deepblue ease-in-out duration-300'>{{$slot}}</a>