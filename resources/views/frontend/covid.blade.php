@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Covid-19 Protocol' bread='Safaty First'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-80p"></div>
            
    <div class="mb-12 grid grid-cols-1 gap-6">

        <div>
            <h2 class="bg-blue inline-block px-4 py-2 text-white font-bold border-red border-l-8 mb-2"><i class="fas fa-temperature-low mr-1"></i> Temperature checks</h2>
            <p>Players and staff will have body temperatures taken prior to joining any activity via touchless thermometers. Per CDC guidelines, individuals with a body temperature greater than 100.4 degrees, will not be permitted to participate in the activity.</p>
        </div>

        <div>
            <h2 class="bg-blue inline-block px-4 py-2 text-white font-bold border-red border-l-8 mb-2"><i class='fas fa-hand-holding-water mr-1'></i> Hand Sanitizing Stations</h2>
            <p>Players will be asked to use hand sanitizer when they join and participate in an activity. <strong>Equipment sanitation</strong>, the staff will clean and disinfect individual and shared equipment, before and after each activity.</p>
        </div>

        <div>
            <h2 class="bg-blue inline-block px-4 py-2 text-white font-bold border-red border-l-8 mb-2"><i class="fas fa-people-arrows mr-1"></i> Face Masks</h2>
            <p>Staff will receive face masks and gloves, which must be worn during activities at all times.
                Players will be required to wear personal face masks during activities
                Players and staff will be asked to notify KISC management if they test positive for COVID-19 within 14 days of their last participation in the activity. We will send an email notification to all potentially exposed individuals if there is a confirmed case of COVID-19 at a KISC activity.</p>
        </div>

        <div>
            <h2 class="bg-blue inline-block px-4 py-2 text-white font-bold border-red border-l-8 mb-2"><i class="fas fa-people-arrows mr-1"></i> Social distancing</h2>
            <p>Each activity will have limited spaces available based on local guidelines to assure safety of all players. Depending on sport, gameplay rules may be modified to assure limited contact and maintain social distancing.</p>
        </div>


      
    </div>

    <div class="separation h-50p"></div>

</main>

@endsection


