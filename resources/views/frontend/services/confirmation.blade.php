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

<x-frontend.pieces.section_header title='{{$service->name}}' bread='Services'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 bg-white rounded-lg">
            
            <div class="h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$service->img}}" alt="">
            </div>

            <div class="p-8">

                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-4"><a href="">{{$service->name}} Registration</a></h1>

                <h2 class="text-info font-roboto text-4xl uppercase font-bold leading-none mb-6">Successful registration!</h2>
                

                <div><span class="font-bold">Registrant User</span>: {{Auth::user()->name}}</div>
                <div><span class="font-bold">Player Name</span>: {{$registration->player_name}}</div>
                <div><span class="font-bold">Date of bird</span>: {{$registration->dob}}</div>
                <div><span class="font-bold">Gender</span>: {{$registration->gender}}</div>
                <div><span class="font-bold">Address</span>: {{$registration->address}}</div>
                <div><span class="font-bold">City</span>: {{$registration->city}}</div>
                <div><span class="font-bold">Zip</span>: {{$registration->zip}}</div>
                <div><span class="font-bold">Phone Home</span>: {{$registration->phone_home}}</div>
                <div><span class="font-bold">Cel</span>: {{$registration->phone_cell}}</div>
                <div><span class="font-bold">Grade</span>: {{$registration->grade}}</div>
                <div><span class="font-bold">Tee Tshirt</span>: {{$registration->tshirt_size}}</div>
                <div><span class="font-bold">Emergency Contact</span>: {{$registration->emergency_contact}}</div>
                <div><span class="font-bold">Emergency Phone</span>: {{$registration->emergency_phone}}</div>
                <div><span class="font-bold">Known allergies or other pertinent medical information</span>: {{$registration->obs}}</div>

                <br>

                <div class="text-center mt-6">

                    <form action="/service-payment" method="POST" id='product-payment-form' class="inline-block">

                        {{ csrf_field() }}
                        <input type="hidden" name="service_price" id='service_price' value="{{$service->price}}">
                        <input type="hidden" name="service_name" id='service_name' value="{{$service->name}}">
                        <input type="hidden" name="registration_id" id='registration_id' value="{{$registration->id}}">
                        <input type="hidden" name="user_name" id='user_name' value="{{Auth::user()->name}}">
                        <input type="hidden" name="user_id" id='user_id' value="{{Auth::user()->id}}">
        
                        <button href='/service/registration/{{$service->id}}' class="font-roboto text-black font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue hover:text-warning ease-in-out duration-300 bg-warning button_link"><i class="far fa-credit-card"></i> Pay Now</button>
        
                    </form>

                    <a href='/profile/dashboard' class="font-roboto text-gray font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue ease-in-out duration-300 bg-red"><i class="fas fa-sign-in-alt"></i> Pay Later</a>

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


