@props(['link' => '/', 'height' => '2'])

<a href="{{$link}}" class='bg-red text-gray font-bold rounded py-{{$height}} px-4 uppercase text-sm hover:bg-deepblue ease-in-out duration-300'>{{$slot}}</a>