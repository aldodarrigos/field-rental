@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );

        function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
    </script>
            <style>
                /* Style the tab */
                .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
                }

                /* Style the buttons that are used to open the tab content */
                .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                }

                /* Change background color of buttons on hover */
                .tab button:hover {
                background-color: #ddd;
                }

                /* Create an active/current tablink class */
                .tab button.active {
                background-color: #ccc;
                }

                /* Style the tab content */
                .tabcontent {
                display: none;
                border: 1px solid #ccc;
                border-top: none;
                }
            </style>


@endsection

@php
    $linkAdmin = (Auth::user()->role ==2)?'<a href="/booking" target="_blank">GO TO ADMIN AREA</a>':'User Profile';
@endphp

<div class="bg-deepblue text-white pt-32">
    <div class="w-11/12 md:w-boxed mx-auto h-120p flex items-center ">
        <div>
            <h1 class="text-2x5 font-bold leading-none pb-2 uppercase">Profile </h1>
            <div class="breadcrumb">
                <a href="/" class="text-red font-bold uppercase">Home</a> <span>/</span> <a href="">{!!$linkAdmin!!}</a>
            </div>
        </div>
    </div>
</div>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-25p"></div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <div class="col-span-12">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
            @endif


            @php
                $pending_payment = 0;

                foreach ($tournaments as $item) {
                    if($item->registration_status != 1 && $item->competition_status == 2){
                        $pending_payment++;
                    }
                }

                foreach ($leagues as $item) {
                    if($item->registration_status != 1 && $item->competition_status == 2){
                        $pending_payment++;
                    }
                }

                foreach ($soccer_clinic as $item) {
                    if($item->registration_status != 1 && $item->event_status == 2){
                        $pending_payment++;
                    }
                }
            @endphp


            <div class="mb-4">
                @if ($pending_payment > 0)
                    <div class="w-full py-3 mt-6 px-4 font-medium tracking-widest text-white uppercase bg-danger shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none rounded-md">
                        You have {{$pending_payment}} pending payments.
                    </div>
                    
                @endif
            </div>

            <!-- Tab links -->
            <div class="tab rounded-t-lg">
                <button class="tablinks active font-roboto font-bold uppercase" onclick="openCity(event, 'fields')" >Fields Booking</button>

                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'services')">Services</button>

                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'tournaments')">Tournaments</button>

                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'leagues')">Leagues</button>

                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'soccer')">Soccer Clinic</button>
                <!--
                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'products')">Product Orders</button>
                -->
            </div>
    
            <!-- Tab content -->
            <div id="fields" class="tabcontent bg-white px-4 py-4" style='display:block;'>

                @include('partials.frontend.profile.fields_orders')
                
                <div class="mt-3 block md:hidden">
                    <small><i class="fas fa-caret-right"></i> Swipe right for more information </small>
                </div>

            </div>

            <div id="services" class="tabcontent bg-white p-4">

                @include('partials.frontend.profile.services_orders')

                <div class="mt-3 block md:hidden">
                    <small><i class="fas fa-caret-right"></i> Swipe right for more information </small>
                </div>

            </div>

            <div id="tournaments" class="tabcontent bg-white p-4">

                @include('partials.frontend.profile.tournaments_orders')

                <div class="mt-3 block md:hidden">
                    <small><i class="fas fa-caret-right"></i> Swipe right for more information </small>
                </div>

            </div>

            <div id="leagues" class="tabcontent bg-white p-4">

                @include('partials.frontend.profile.leagues_orders')

                <div class="mt-3 block md:hidden">
                    <small><i class="fas fa-caret-right"></i> Swipe right for more information </small>
                </div>

            </div>



            <div id="soccer" class="tabcontent bg-white p-4">

                @include('partials.frontend.profile.soccer_clinics')

                <div class="mt-3 block md:hidden">
                    <small><i class="fas fa-caret-right"></i> Swipe right for more information </small>
                </div>

            </div>

            <!--
            <div id="products" class="tabcontent bg-white p-4">

                @include('partials.frontend.profile.soccer_clinics')
                

            </div>
            -->


            


            
        </div>
    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


