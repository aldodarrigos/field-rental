
<x-frontend.pieces.big_show_dual_video>
    <x-slot name='subtitle'>{{$content->subtitle}}</x-slot>
    <x-slot name='title'>{{$content->title}}<br> </x-slot>
    <x-slot name='title_color'>white</x-slot>
    <x-slot name='sumary'>
        {{$content->content}}
    </x-slot>
    <x-slot name='video'>https://www.youtube.com/embed/{{$content->video}}</x-slot>
    <x-slot name='bg'>blue</x-slot>
    <x-slot name='link'>/{{$content->link}}</x-slot>
    <x-slot name='link_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
</x-frontend.pieces.big_show_dual_video>
