@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Fields' bread='Our fields'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <x-frontend.pieces.big_show_dual_video>
        <x-slot name='subtitle'>Welcome</x-slot>
        <x-slot name='title'>KatyISC, sport center<br> </x-slot>
        <x-slot name='title_color'>white</x-slot>
        <x-slot name='sumary'>
            Lorem, ipsum dolor sit amet conse adipisicing elit. Exercitationem voluptas amet aliquam. Perferendis magni assumenda ab natus nesciunt delectus ut. 
        </x-slot>
        <x-slot name='video'>https://www.youtube.com/embed/e5lJg_ZO1C8</x-slot>
        <x-slot name='bg'>blue</x-slot>
        <x-slot name='link'>/</x-slot>
        <x-slot name='link_text'>Book a field <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
    </x-frontend.pieces.big_show_dual_video>

    <div class="separation h-50p"></div>

    <div class="mb-12 grid grid-cols-1 md:grid-cols-3 gap-6">

        <x-frontend.cards.big>
            <x-slot name='subtitle'>Fields</x-slot>
            <x-slot name='title'>Azteca</x-slot>
            <x-slot name='title_color'>white</x-slot>
            <x-slot name='sumary'>
                <p>Lorem, ipsum dolor sit amet conse adipisicing elit. Incidunt eius impedit aut ut repellendus saepe expedita.</p> 
                <ul>
                    <li>- Lorem, ipsum dolor.</li>
                    <li>- Consectetur adipisicing elit.</li>
                    <li>- Perferendis magni assumenda.</li>
                    <li>- Natus nesciunt delectus.</li>
                </ul>
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='image'>https://images.unsplash.com/photo-1531861218190-f90c89febf69</x-slot>
            <x-slot name='image_height'>250p</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='link'>/fieldsrental</x-slot>
            <x-slot name='link_text'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
            <x-slot name='tag'>7x7 players</x-slot>
        </x-frontend.cards.big>

        <x-frontend.cards.big>
            <x-slot name='subtitle'>Fields</x-slot>
            <x-slot name='title'>Allianz Arena</x-slot>
            <x-slot name='title_color'>white</x-slot>
            <x-slot name='sumary'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eum fugiat maxime delectus architecto commodi veniam et!</p> 
                <ul>
                    <li>- Lorem, ipsum dolor.</li>
                    <li>- Consectetur adipisicing elit.</li>
                    <li>- Perferendis magni assumenda.</li>
                    <li>- Natus nesciunt delectus.</li>
                </ul>
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='image'>https://images.unsplash.com/photo-1505305976870-c0be1cd39939</x-slot>
            <x-slot name='image_height'>250p</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='link'>/fieldsrental</x-slot>
            <x-slot name='link_text'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
            <x-slot name='tag'>7x7 players</x-slot>
        </x-frontend.cards.big>

        <x-frontend.cards.big>
            <x-slot name='subtitle'>Fields</x-slot>
            <x-slot name='title'>Soccer City</x-slot>
            <x-slot name='title_color'>white</x-slot>
            <x-slot name='sumary'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eum fugiat maxime delectus architecto commodi veniam et!</p> 
                <ul>
                    <li>- Lorem, ipsum dolor.</li>
                    <li>- Consectetur adipisicing elit.</li>
                    <li>- Perferendis magni assumenda.</li>
                    <li>- Natus nesciunt delectus.</li>
                </ul>
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='image'>https://images.unsplash.com/photo-1431324155629-1a6deb1dec8d</x-slot>
            <x-slot name='image_height'>250p</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='link'>/fieldsrental</x-slot>
            <x-slot name='link_text'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
            <x-slot name='tag'>7x7 players</x-slot>
        </x-frontend.cards.big>

        <x-frontend.cards.big>
            <x-slot name='subtitle'>Fields</x-slot>
            <x-slot name='title'>Camp Nou</x-slot>
            <x-slot name='title_color'>white</x-slot>
            <x-slot name='sumary'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eum fugiat maxime delectus architecto commodi veniam et!</p> 
                <ul>
                    <li>- Lorem, ipsum dolor.</li>
                    <li>- Consectetur adipisicing elit.</li>
                    <li>- Perferendis magni assumenda.</li>
                    <li>- Natus nesciunt delectus.</li>
                </ul>
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='image'>https://images.unsplash.com/photo-1600066975952-912a81940822</x-slot>
            <x-slot name='image_height'>250p</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='link'>/fieldsrental</x-slot>
            <x-slot name='link_text'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
            <x-slot name='tag'>5x5 players</x-slot>
        </x-frontend.cards.big>

        <x-frontend.cards.big>
            <x-slot name='subtitle'>Fields</x-slot>
            <x-slot name='title'>Bombonera</x-slot>
            <x-slot name='title_color'>white</x-slot>
            <x-slot name='sumary'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eum fugiat maxime delectus architecto commodi veniam et!</p> 
                <ul>
                    <li>- Lorem, ipsum dolor.</li>
                    <li>- Consectetur adipisicing elit.</li>
                    <li>- Perferendis magni assumenda.</li>
                    <li>- Natus nesciunt delectus.</li>
                </ul>
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='image'>https://images.unsplash.com/photo-1505305976870-c0be1cd39939</x-slot>
            <x-slot name='image_height'>250p</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='link'>/fieldsrental</x-slot>
            <x-slot name='link_text'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
            <x-slot name='tag'>5x5 players</x-slot>
        </x-frontend.cards.big>

        <x-frontend.cards.big>
            <x-slot name='subtitle'>Feilds</x-slot>
            <x-slot name='title'>San Siro</x-slot>
            <x-slot name='title_color'>white</x-slot>
            <x-slot name='sumary'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eum fugiat maxime delectus architecto commodi veniam et!</p> 
                <ul>
                    <li>- Lorem, ipsum dolor.</li>
                    <li>- Consectetur adipisicing elit.</li>
                    <li>- Perferendis magni assumenda.</li>
                    <li>- Natus nesciunt delectus.</li>
                </ul>
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='image'>https://images.unsplash.com/photo-1546717003-caee5f93a9db</x-slot>
            <x-slot name='image_height'>250p</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='link'>/</x-slot>
            <x-slot name='link_text'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
            <x-slot name='tag'>5x5 players</x-slot>
        </x-frontend.cards.big>

        <x-frontend.cards.big>
            <x-slot name='subtitle'>Fields</x-slot>
            <x-slot name='title'>Maracana</x-slot>
            <x-slot name='title_color'>white</x-slot>
            <x-slot name='sumary'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eum fugiat maxime delectus architecto commodi veniam et!</p> 
                <ul>
                    <li>- Lorem, ipsum dolor.</li>
                    <li>- Consectetur adipisicing elit.</li>
                    <li>- Perferendis magni assumenda.</li>
                    <li>- Natus nesciunt delectus.</li>
                </ul>
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='image'>https://images.unsplash.com/photo-1508181382850-5b57cb8caa92</x-slot>
            <x-slot name='image_height'>250p</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='link'>/fieldsrental</x-slot>
            <x-slot name='link_text'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
            <x-slot name='tag'>5x5 players</x-slot>
        </x-frontend.cards.big>

        <x-frontend.cards.big>
            <x-slot name='subtitle'>Fields</x-slot>
            <x-slot name='title'>Da Luz</x-slot>
            <x-slot name='title_color'>white</x-slot>
            <x-slot name='sumary'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eum fugiat maxime delectus architecto commodi veniam et!</p> 
                <ul>
                    <li>- Lorem, ipsum dolor.</li>
                    <li>- Consectetur adipisicing elit.</li>
                    <li>- Perferendis magni assumenda.</li>
                    <li>- Natus nesciunt delectus.</li>
                </ul>
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='image'>https://images.unsplash.com/photo-1531861218190-f90c89febf69</x-slot>
            <x-slot name='image_height'>250p</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='link'>/fieldsrental</x-slot>
            <x-slot name='link_text'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
            <x-slot name='tag'>5x5 players</x-slot>
        </x-frontend.cards.big>

        <x-frontend.cards.big>
            <x-slot name='subtitle'>Fields</x-slot>
            <x-slot name='title'>Wembley</x-slot>
            <x-slot name='title_color'>white</x-slot>
            <x-slot name='sumary'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eum fugiat maxime delectus architecto commodi veniam et!</p> 
                <ul>
                    <li>- Lorem, ipsum dolor.</li>
                    <li>- Consectetur adipisicing elit.</li>
                    <li>- Perferendis magni assumenda.</li>
                    <li>- Natus nesciunt delectus.</li>
                </ul>
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='image'>https://images.unsplash.com/photo-1510526292299-20af3f62d453</x-slot>
            <x-slot name='image_height'>250p</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='link'>/fieldsrental</x-slot>
            <x-slot name='link_text'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-slot>
            <x-slot name='tag'>5x5 players</x-slot>
        </x-frontend.cards.big>


    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


