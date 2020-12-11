@props(['title' => 'Title', 'image' => ''])
<div class="mb-8">
    <header class="font-roboto bg-blue text-white text-lg uppercase font-bold py-3 px-4 border-red border-l-8 rounded-t-md">
        {{$title}}
    </header>

    <div class="p-4 bg-white rounded-b-md">
        {{$slot}}
    </div>
</div>