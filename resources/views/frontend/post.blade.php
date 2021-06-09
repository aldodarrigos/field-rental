@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent

    <script>
        $(document).ready(function(){

            $('#post_content').each(function(){
                // Get the content
                var str = $(this).html();
                // Set the regex string

                var regex = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|].(?:jpg|gif|png|webp))/ig;

                // Replace plain text links by hyperlinks
                var replaced_text = str.replace(regex, "<img src='$1' class='max-w-full border-8 border-gray mx-auto'>");
                // Echo link
                $(this).html(replaced_text);
            });
        });
    </script>

@endsection

<x-frontend.pieces.section_header title='Blog' bread='latest News'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 bg-white rounded-lg">
            
            <div class="h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$post->img}}" alt="">
            </div>

            <div class="p-8">
                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-3">{{$post->title}}</h1>

                <div class="mb-8">
                    <a href="/tags/{{$post->tag_slug}}" class="font-roboto bg-red font-semibold uppercase text-white text-sm px-2 py-1 mr-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300">{{$post->tag_name}}</a> 
                   <span class="text-sm text-black font-bold">{{$post->pub_date}}</span>
               </div>


    
               <div id='post_content' class="text_content">

                    {!!$post->content!!}

               </div>


            </div>

        </main>
        
        <aside class="col-span-12 md:col-span-4">

            <!--
            <livewire:frontend.aside-ad></livewire:frontend.aside-ad>
            <livewire:frontend.aside-tournament></livewire:frontend.aside-tournament>
            <livewire:frontend.aside-nextmatch></livewire:frontend.aside-nextmatch>
            -->
            
            <livewire:frontend.location-info></livewire:frontend.location-info>

            <livewire:frontend.location-map></livewire:frontend.location-map>

        </aside>
    </div>
    
</div>

@endsection


