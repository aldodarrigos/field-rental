@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Covid-19 Protocol' bread='Safaty First'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-80p"></div>
            
    <div class="mb-12 grid grid-cols-1 gap-6">

        <x-frontend.pieces.item_icon>
            <x-slot name='title'>Temperature checks</x-slot>
            <x-slot name='icon'>fas fa-temperature-low</x-slot>
            <x-slot name='icon_color'>gray</x-slot>
            <x-slot name='sumary'>Players and staff will have body temperatures taken prior to joining any activity via touchless thermometers. Per CDC guidelines, individuals with a body temperature greater than 100.4 degrees, will not be permitted to participate in the activity.
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_on_off'>false</x-slot>
            <x-slot name='custom_grid'>true</x-slot>
            <x-slot name='colSpanA'>1</x-slot>
            <x-slot name='colSpanB'>11</x-slot>
        </x-frontend.pieces.item_icon>

        <x-frontend.pieces.item_icon>
            <x-slot name='title'>Hand Sanitizing Stations</x-slot>
            <x-slot name='icon'>fas fa-hand-holding-water</x-slot>
            <x-slot name='icon_color'>gray</x-slot>
            <x-slot name='sumary'>Players will be asked to use hand sanitizer when they join and participate in an activity. <strong>Equipment sanitation</strong>, the staff will clean and disinfect individual and shared equipment, before and after each activity.</x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>deepblue</x-slot>
            <x-slot name='button_on_off'>false</x-slot>
            <x-slot name='custom_grid'>true</x-slot>
            <x-slot name='colSpanA'>1</x-slot>
            <x-slot name='colSpanB'>11</x-slot>
        </x-frontend.pieces.item_icon>
        
        <x-frontend.pieces.item_icon>
            <x-slot name='title'>Face Masks</x-slot>
            <x-slot name='icon'>fas fa-head-side-mask</x-slot>
            <x-slot name='icon_color'>gray</x-slot>
            <x-slot name='sumary'>Staff will receive face masks and gloves, which must be worn during activities at all times.
                Players will be required to wear personal face masks during activities
                Players and staff will be asked to notify KISC management if they test positive for COVID-19 within 14 days of their last participation in the activity. We will send an email notification to all potentially exposed individuals if there is a confirmed case of COVID-19 at a KISC activity.
            </x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>blue</x-slot>
            <x-slot name='button_on_off'>false</x-slot>
            <x-slot name='custom_grid'>true</x-slot>
            <x-slot name='colSpanA'>1</x-slot>
            <x-slot name='colSpanB'>11</x-slot>
        </x-frontend.pieces.item_icon>
        
        <x-frontend.pieces.item_icon>
            <x-slot name='title'>Social distancing</x-slot>
            <x-slot name='icon'>fas fa-people-arrows</x-slot>
            <x-slot name='icon_color'>gray</x-slot>
            <x-slot name='sumary'>Each activity will have limited spaces available based on local guidelines to assure safety of all players. Depending on sport, gameplay rules may be modified to assure limited contact and maintain social distancing.</x-slot>
            <x-slot name='sumary_color'>gray</x-slot>
            <x-slot name='bg'>deepblue</x-slot>
            <x-slot name='button_on_off'>false</x-slot>
            <x-slot name='custom_grid'>true</x-slot>
            <x-slot name='colSpanA'>1</x-slot>
            <x-slot name='colSpanB'>11</x-slot>
        </x-frontend.pieces.item_icon>

      
    </div>

    <div class="separation h-50p"></div>

</main>

@endsection


