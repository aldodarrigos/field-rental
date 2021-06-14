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

<x-frontend.pieces.section_header title='{{$registration->event_name}}' bread='Tournaments'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-6 py-8">

        <main class="col-span-12 md:col-span-8 bg-white rounded-lg">
            
            <div class="h-400p">
                <img class="object-cover w-full h-full rounded-t-lg" src="{{$registration->event_img}}" alt="">
            </div>

            <div class="p-8">

                <h1 class="font-roboto text-3x uppercase font-bold text-black leading-none mb-4"><a href="">{{$registration->event_name}}</a></h1>

                @if ($registration->registration_status == 0)
                    <h2 class="text-info font-roboto text-4xl uppercase font-bold leading-none mb-6">Successful registration!</h2>
                @elseif ($registration->registration_status == 1)
                    <h2 class="text-info font-roboto text-4xl uppercase font-bold leading-none mb-6">Successful payment!</h2>
                @endif
                
                <div class="mb-2"><span class="font-bold">Registrant User</span>: {{$registration->user_name}}</div>
                <div class="mb-2"><span class="font-bold">Email</span>: {{$registration->user_email}}</div>
                <div class="mb-2"><span class="font-bold">Price</span>: ${{$registration->final_price}}</div>
                <div class="mb-2"><span class="font-bold">Date</span>: {{date('M d, Y h:m:s A', strtotime($registration->registration_updated_at))}}</div>
                @if ($registration->registration_status == 1)
                    <div class="mb-2"><span class="font-bold">Paypal Payment Code</span>: {{$registration->payment_code}}</div>
                @endif
                
                <br>

                <div class="table-responsive">
                    <table class="table-auto border-collapse w-full">

                        <thead>
                          <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Player Name</th>
                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Age</th>
                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Gender</th>
                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Category</th>
                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Tshirt Size</th>
                          </tr>
                        </thead>
    
                        <tbody class="text-sm font-normal text-gray-700">
    
                            @foreach ($players as $player)
                            @php
                                $gender = ($player->gender == 1)?'Female':'Male';
                            @endphp
                            <tr class="hover:bg-gray-100 border-b border-graylines py-10">
                                <td class="px-4 py-4 font-bold">{{$player->name}}</td>
                                <td class="px-4 py-4">{{$player->age}}</td>
                                <td class="px-4 py-4">{{$gender}}</td>
                                <td class="px-4 py-4">{{$player->obs}}</td>
                                <td class="px-4 py-4">{{$player->tshirt_size}}</td>
                            </tr>
    
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <br>

                @if ($registration->registration_status == 0)

                    @if ($registration->event_status == 2)
                        
                    <div class="text-center mt-6">

                        <form action="/soccer-clinic-payment" method="POST" id='competition-payment-form' class="inline-block">

                            {{ csrf_field() }}
                            <input type="hidden" name="final_price" id='final_price' value="{{$registration->final_price}}">
                            <input type="hidden" name="event_name" id='event_name' value="{{$registration->event_name}}">
                            <input type="hidden" name="registration_id" id='registration_id' value="{{$registration->registration_id}}">
                            
                            <input type="hidden" name="user_name" id='user_name' value="{{$registration->user_name}}">
                            <input type="hidden" name="user_email" id='user_email' value="{{$registration->user_email}}">
            
                            <button class="font-roboto text-black font-bold rounded py-3 px-3 uppercase text-lg hover:bg-deepblue hover:text-warning ease-in-out duration-300 bg-warning button_link mb-4"><i class="far fa-credit-card"></i> Pay Now</button>
            
                        </form>

                        <a href='/profile/dashboard' class="font-roboto text-gray font-bold rounded py-3 px-3 uppercase text-lg hover:bg-deepblue ease-in-out duration-300 bg-red truncate"><i class="fas fa-sign-in-alt"></i> Pay Later</a>

                    </div>

                    @endif
                    
                @else
                    
                @endif

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


