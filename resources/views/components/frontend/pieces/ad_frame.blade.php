@props(['title' => 'Title', 'image' => ''])

<div class="mb-8">
    <header class="font-roboto bg-blue text-white text-lg uppercase font-bold py-3 px-4 border-red border-l-8 rounded-t-md">
        {{$frame_icon}} {{$title}}
    </header>

    @php
        $line_color = ($bg == 'blue')?'bluetext':'white';
    @endphp

    <div class="p-4 bg-{{$bg}} rounded-b-md border-t border-{{$line_color}}">
        {{$slot}}
    </div>
</div>