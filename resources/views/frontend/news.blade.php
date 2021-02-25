@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='News' bread='latest News'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-4 py-8">

        <main class="col-span-12 md:col-span-8">

            @foreach ($posts as $post)
                <x-frontend.cards.post_flat>
                    <x-slot name='image'>{{$post->img}}</x-slot>
                    <x-slot name='title'>{{$post->title}}</x-slot>
                    <x-slot name='link'>/post/{{$post->slug}}</x-slot>
                    <x-slot name='date'>{{$post->pub_date}}</x-slot>
                    <x-slot name='sumary'>{{$post->sumary}}</x-slot>
                    <x-slot name='bg'>white</x-slot>
                    <x-slot name='tag'>{{$post->tag_name}}</x-slot>
                    <x-slot name='tag_link'>/tags/{{$post->tag_slug}}</x-slot>
                </x-frontend.cards.post_flat>
            @endforeach

        </main>
        
        <aside class="col-span-12 md:col-span-4">
            
            <livewire:frontend.location-info></livewire:frontend.location-info>

            <livewire:frontend.location-map></livewire:frontend.location-map>
            
        </aside>
    </div>
    
</div>

@endsection


