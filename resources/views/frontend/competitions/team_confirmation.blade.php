@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    <script>
        $(document).ready(function(){
            $( "iframe" ).wrap( "<div class='video-responsive'></div>" );
       });
    </script>

    

@endsection

@php
    $competition_title = ($competition->is_league == 1)?'Leagues':'Tournaments';
@endphp

<x-frontend.pieces.section_header title='{{$competition->name}}' bread='{{$competition_title}}'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 bg-white rounded-lg">
            
            <div class="h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$competition->img}}" alt="">
            </div>

            <div class="p-8">

                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-4"><a href="">{{$competition->name}}</a></h1>

                <h2 class="text-info font-roboto text-4xl uppercase font-bold leading-none mb-6">Successful registration!</h2>
                
                @php
                    $gender = ($registration->gender == 1)?'Female':'Male';
                @endphp

                <div class="mb-2"><span class="font-bold">Registrant User</span>: {{$registration->user_name}}</div>
                <div class="mb-2"><span class="font-bold">Email</span>: {{$registration->user_email}}</div>
                <div class="mb-2"><span class="font-bold">Team name</span>: {{$registration->team_name}}</div>
                <div class="mb-2"><span class="font-bold">Category</span>: {{$registration->category}}</div>
                <div class="mb-2"><span class="font-bold">Gender</span>: {{$gender}}</div>
                <div class="mb-2"><span class="font-bold">Uniform colors</span>: {{$registration->uniforms}}</div>
                <div class="mb-2"><span class="font-bold">Price</span>: ${{$registration->registration_price}}</div>
                

                <br>

                <div class="text-center mt-6">

                    @if ($registration->registration_status == 0)

                        @if ($registration->competition_status == 2)

                        <form action="/competition-payment" method="POST" id='competition-payment-form' class="inline-block">

                            {{ csrf_field() }}
                            <input type="hidden" name="registration_price" id='registration_price' value="{{$registration->registration_price}}">
                            <input type="hidden" name="competition_name" id='competition_name' value="{{$competition->name}}">
                            <input type="hidden" name="team_name" id='team_name' value="{{$registration->team_name}}">
                            <input type="hidden" name="team_id" id='team_id' value="{{$registration->team_id}}">
                            <input type="hidden" name="registration_id" id='registration_id' value="{{$registration->registration_id}}">
                            <input type="hidden" name="competition_id" id='competition_id' value="{{$registration->registration_id}}">
                            <input type="hidden" name="user_name" id='user_name' value="{{$registration->user_name}}">
                            <input type="hidden" name="user_id" id='user_id' value="{{$registration->manager}}">
            
                            <button class="font-roboto text-black font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue hover:text-warning ease-in-out duration-300 bg-warning button_link"><i class="far fa-credit-card"></i> Pay Now</button>
            
                        </form>

                        <a href='/profile/dashboard' class="font-roboto text-gray font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue ease-in-out duration-300 bg-red"><i class="fas fa-sign-in-alt"></i> Pay Later</a>

                        @endif
                    @endif

                </div>

            </div>

        </main>
        
        <aside class="col-span-12 md:col-span-4">
            
            <!--
            <livewire:frontend.aside-tournament></livewire:frontend.aside-tournament>
            <livewire:frontend.aside-nextmatch></livewire:frontend.aside-nextmatch>
            -->

            <livewire:frontend.location-info></livewire:frontend.location-info>

            <livewire:frontend.location-map></livewire:frontend.location-map>

        </aside>
    </div>
    
</div>

@endsection


