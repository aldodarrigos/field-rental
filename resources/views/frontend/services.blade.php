@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='OUR SERVICES' bread='Services'></x-frontend.pieces.section_header>

<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-80p"></div>
            
    <div class="mb-12 grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <x-frontend.cards.services>
            <x-slot name='image'>https://images.unsplash.com/photo-1531861218190-f90c89febf69</x-slot>
            <x-slot name='title'>Fields rental</x-slot>
            <x-slot name='sumary'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus natus saepe dicta cum illum dignissimos minima reprehenderit, laborum porro deleniti...
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
            <x-slot name='button_link'>/service/xxx</x-slot>
        </x-frontend.cards.services>
        
        <x-frontend.cards.services>
            <x-slot name='image'>https://images.unsplash.com/photo-1582586302869-715be816f60b</x-slot>
            <x-slot name='title'>Tournaments</x-slot>
            <x-slot name='sumary'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus natus saepe dicta cum illum dignissimos minima reprehenderit, laborum porro deleniti...
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
            <x-slot name='button_link'>/service/xxx</x-slot>
        </x-frontend.cards.services>
        
        <x-frontend.cards.services>
            <x-slot name='image'>https://images.unsplash.com/photo-1528055247872-109ee5f9fab9</x-slot>
            <x-slot name='title'>Soccer Academy</x-slot>
            <x-slot name='sumary'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus natus saepe dicta cum illum dignissimos minima reprehenderit, laborum porro deleniti...
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
            <x-slot name='button_link'>/service/xxx</x-slot>
        </x-frontend.cards.services>
        
        <x-frontend.cards.services>
            <x-slot name='image'>https://images.unsplash.com/photo-1518604666860-9ed391f76460</x-slot>
            <x-slot name='title'>Membership</x-slot>
            <x-slot name='sumary'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus natus saepe dicta cum illum dignissimos minima reprehenderit, laborum porro deleniti...
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
            <x-slot name='button_link'>/service/xxx</x-slot>
        </x-frontend.cards.services>
        
        <x-frontend.cards.services>
            <x-slot name='image'>https://images.unsplash.com/flagged/photo-1568904521613-14b3257dcb7b</x-slot>
            <x-slot name='title'>Summer Clinic</x-slot>
            <x-slot name='sumary'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus natus saepe dicta cum illum dignissimos minima reprehenderit, laborum porro deleniti...
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
            <x-slot name='button_link'>/service/xxx</x-slot>
        </x-frontend.cards.services>
        
        <x-frontend.cards.services>
            <x-slot name='image'>https://images.unsplash.com/photo-1566514883769-ea43185ee0d5</x-slot>
            <x-slot name='title'>Events</x-slot>
            <x-slot name='sumary'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus natus saepe dicta cum illum dignissimos minima reprehenderit, laborum porro deleniti...
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
            <x-slot name='button_link'>/service/xxx</x-slot>
        </x-frontend.cards.services>
        
        <x-frontend.cards.services>
            <x-slot name='image'>https://images.unsplash.com/photo-1601176682258-172d20729a0c</x-slot>
            <x-slot name='title'>After School</x-slot>
            <x-slot name='sumary'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus natus saepe dicta cum illum dignissimos minima reprehenderit, laborum porro deleniti...
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
            <x-slot name='button_link'>/service/xxx</x-slot>
        </x-frontend.cards.services>
        
        <x-frontend.cards.services>
            <x-slot name='image'>https://images.unsplash.com/photo-1597649497866-1fec75c4fb0d</x-slot>
            <x-slot name='title'>Soccer TV</x-slot>
            <x-slot name='sumary'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus natus saepe dicta cum illum dignissimos minima reprehenderit, laborum porro deleniti...
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
            <x-slot name='button_link'>/service/xxx</x-slot>
        </x-frontend.cards.services>
        
        <x-frontend.cards.services>
            <x-slot name='image'>https://images.unsplash.com/photo-1563485572254-f7726be2d989</x-slot>
            <x-slot name='title'>Soccer Fun park</x-slot>
            <x-slot name='sumary'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus natus saepe dicta cum illum dignissimos minima reprehenderit, laborum porro deleniti...
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_text'>Read more <i class="fas fa-plus text-xs pl-1"></i></x-slot>
            <x-slot name='button_link'>/service/xxx</x-slot>
        </x-frontend.cards.services>

    </div>

    <div class="separation h-50p"></div>

</main>

@endsection


