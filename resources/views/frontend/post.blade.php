@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Blog' bread='latest News'></x-frontend.pieces.section_header>

<div class="w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-8 bg-white rounded-lg">
            
            <div class="h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="http://fc-united.axiomthemes.com/wp-content/uploads/2018/11/post-12-copyright-600x394.jpg" alt="">
            </div>

            <div class="p-8">
                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-3"><a href="">Effective Training Programs for Professional Players</a></h1>

                <div class="mb-8">
                    <a href="/" class="font-roboto bg-red font-semibold uppercase text-white text-sm px-2 py-1 mr-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300">Tournaments</a> 
                   <span class="text-sm text-black font-bold">December 10, 2020</span>
               </div>
    
               <div>
                   <p>Lorem ipsum dolor sit amet <strong>consectetur</strong> adipisicing elit. Veniam quae ut impedit, assumenda ea blanditiis similique sequi necessitatibus sapiente ipsam illo explicabo pariatur expedita dignissimos atque? Dicta, reprehenderit? Tenetur fugiat voluptatibus aspernatur sequi impedit nemo.</p>

                   <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil assumenda perspiciatis commodi exercitationem qui? Alias similique quam non facilis voluptate, nobis aut magnam recusandae fuga quo sapiente dolorum.</p>

                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quaerat aspernatur doloremque eum beatae a dolores aperiam debitis sequi eveniet eius provident possimus, labore deleniti quam nihil. Laborum consequuntur corrupti libero nisi consectetur est praesentium placeat nam quas.</p>

                   <img src="https://images.unsplash.com/photo-1543326727-cf6c39e8f84c" alt="">
                   <br>

                   <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. <strong>Illo ratione est eligendi dolore! Sequi</strong>, molestias? Esse quam possimus quibusdam aliquam dolor officiis eligendi fugiat sequi commodi!</p>

                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quae ut impedit, assumenda ea blanditiis similique sequi necessitatibus sapiente ipsam illo explicabo pariatur expedita dignissimos atque? Dicta, reprehenderit? Tenetur fugiat voluptatibus aspernatur sequi impedit nemo.</p>

                   <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo ratione est eligendi dolore! Sequi, molestias? Esse quam possimus quibusdam aliquam dolor officiis eligendi fugiat sequi commodi!</p>

                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quae ut impedit, assumenda ea blanditiis similique sequi necessitatibus sapiente ipsam illo explicabo pariatur expedita dignissimos atque? Dicta, reprehenderit? Tenetur fugiat voluptatibus aspernatur sequi impedit nemo.</p>

                   <p><strong>Lorem ipsum, dolor sit amet consectetur</strong> adipisicing elit. Nihil assumenda perspiciatis commodi exercitationem qui? Alias similique quam non facilis voluptate, nobis aut magnam recusandae fuga quo sapiente dolorum.</p>

                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quaerat aspernatur doloremque eum beatae a dolores aperiam debitis sequi eveniet eius provident possimus, labore deleniti quam nihil. Laborum consequuntur corrupti libero nisi consectetur est praesentium placeat nam quas.</p>

                   <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo ratione est eligendi dolore! Sequi, molestias? Esse quam possimus quibusdam aliquam dolor officiis eligendi fugiat sequi commodi!</p>

                   <x-frontend.pieces.video_responsive>
                       <x-slot name='url'>https://www.youtube.com/embed/mA3lsx1F28c</x-slot>
                   </x-frontend.pieces.video_responsive>


               </div>
            </div>

        </main>
        
        <aside class="col-span-4">

            <livewire:frontend.aside-ad></livewire:frontend.aside-ad>
            <livewire:frontend.aside-tournament></livewire:frontend.aside-tournament>
            <livewire:frontend.aside-nextmatch></livewire:frontend.aside-nextmatch>

        </aside>
    </div>
    
</div>

@endsection


