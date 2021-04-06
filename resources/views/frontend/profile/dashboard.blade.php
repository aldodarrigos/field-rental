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



@endsection

<x-frontend.pieces.section_header title='Profile' bread='Dashboard'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <div class="col-span-12">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
            @endif

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


            <!-- Tab links -->
            <div class="tab rounded-t-lg">
                <button class="tablinks active font-roboto font-bold uppercase" onclick="openCity(event, 'fields')" >Fields Booking</button>

                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'services')">Services</button>

                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'tournaments')">Tournaments</button>

                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'leagues')">Leagues</button>

                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'products')">Product Orders</button>

                <button class="tablinks font-roboto font-bold uppercase" onclick="openCity(event, 'streaming')">Streaming</button>
            </div>
    
            <!-- Tab content -->
            <div id="fields" class="tabcontent bg-white px-4 py-4" style='display:block;'>

                @include('partials.frontend.profile.fields_orders')

            </div>

            <div id="services" class="tabcontent bg-white p-4">

                @include('partials.frontend.profile.services_orders')

            </div>

            <div id="tournaments" class="tabcontent bg-white p-4">

                @include('partials.frontend.profile.tournaments_orders')

            </div>

            <div id="leagues" class="tabcontent bg-white p-4">

                @include('partials.frontend.profile.leagues_orders')

            </div>

            <div id="products" class="tabcontent bg-white p-4">

                @include('partials.frontend.profile.products_orders')

            </div>


            <div id="streaming" class="tabcontent bg-white p-4">

                <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

                rtsp://admin:Gt514865*@50.213.160.94:554/streaming/channels/101

                <video id="video" autoplay="true" controls="controls" type='application/x-mpegURL'></video>
                <script>
                if (Hls.isSupported()) {
                    var video = document.getElementById('video');
                    var hls = new Hls();
                    // bind them together
                    hls.attachMedia(video);
                    hls.on(Hls.Events.MEDIA_ATTACHED, function () {
                    console.log("video and hls.js are now bound together !");
                    hls.loadSource("rtsp://admin:Gt514865*@50.213.160.94:554/streaming/channels/101");
                    hls.on(Hls.Events.MANIFEST_PARSED, function (event, data) {
                    });
                    });
                }
                </script>

            </div>
            


            
        </div>
    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


