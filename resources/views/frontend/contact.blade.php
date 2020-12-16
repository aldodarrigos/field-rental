@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    
@endsection

<x-frontend.pieces.section_header title='Contact' bread='Contact Us'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-12 gap-8">

        <section class="col-span-12 md:col-span-8">

            <form class="mt-6">

                <div class="flex justify-between gap-3">

                  <span class="w-1/2">
                    <x-frontend.forms.input_text>
                        <x-slot name='type'>text</x-slot>
                        <x-slot name='label'>Firstname</x-slot>
                        <x-slot name='id'>firstname</x-slot>
                        <x-slot name='placeholder'>John</x-slot>
                        <x-slot name='autocomplete'>off</x-slot>
                        <x-slot name='required'>on</x-slot>
                        <x-slot name='height'>big</x-slot>
                        <x-slot name='bg'>light</x-slot>
                        <x-slot name='label_on_off'>on</x-slot>
                    </x-frontend.forms.input_text>
                  </span>

                  <span class="w-1/2">
                    <x-frontend.forms.input_text>
                        <x-slot name='type'>text</x-slot>
                        <x-slot name='label'>Lastname</x-slot>
                        <x-slot name='id'>lastname</x-slot>
                        <x-slot name='placeholder'>Doe</x-slot>
                        <x-slot name='autocomplete'>off</x-slot>
                        <x-slot name='required'>on</x-slot>
                        <x-slot name='height'>big</x-slot>
                        <x-slot name='bg'>light</x-slot>
                        <x-slot name='label_on_off'>on</x-slot>
                    </x-frontend.forms.input_text>
                  </span>
                  
                </div>

                <x-frontend.forms.input_text>
                    <x-slot name='type'>email</x-slot>
                    <x-slot name='label'>Email</x-slot>
                    <x-slot name='id'>email</x-slot>
                    <x-slot name='placeholder'>john.doe@company.com</x-slot>
                    <x-slot name='autocomplete'>off</x-slot>
                    <x-slot name='required'>on</x-slot>
                    <x-slot name='height'>big</x-slot>
                    <x-slot name='bg'>light</x-slot>
                    <x-slot name='label_on_off'>on</x-slot>
                </x-frontend.forms.input_text>
            
                <x-frontend.forms.textarea>
                    <x-slot name='label'>Message</x-slot>
                    <x-slot name='id'>message</x-slot>
                    <x-slot name='placeholder'>Your message</x-slot>
                    <x-slot name='autocomplete'>on</x-slot>
                    <x-slot name='required'>on</x-slot>
                </x-frontend.forms.textarea>


                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-blue shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none rounded-md">
                  SEND
                </button>

                <p class="flex justify-between inline-block mt-4 text-xs text-gray-500 cursor-pointer hover:text-black">Already registered?</p>
              
            </form>
        </section>
        <aside class="col-span-12 md:col-span-4">

            <x-frontend.pieces.ad_frame title='Location'>
                <x-slot name='frame_icon'><i class="fas fa-map-marker-alt"></i></x-slot>
                <x-slot name='bg'>blue</x-slot>

                <div class="text-xl text-red font-bold leading-none mb-1">2029 Pecan Ln Katy Texas</div>
                <div class="text-base text-gray font-semibold mb-1">09:00am - 06:00pm (Admin)</div>
                <div class="text-base text-gray font-semibold mb-1">info@katyisc.com</div>
                <div class="text-base text-gray font-semibold mb-1">+1 (910) 574-5865</div>
                <div class="text-base text-gray font-semibold mb-1">+1 (832) 282-8030</div>
                
            </x-frontend.pieces.ad_frame>

            <x-frontend.pieces.ad_frame title='Location'>
                <x-slot name='frame_icon'><i class="fas fa-map-marker-alt"></i></x-slot>
                <x-slot name='bg'>white</x-slot>

                <div id="map" class="h-500p w-full inline-block"></div>

                <script> 
            
                    document.addEventListener('DOMContentLoaded', function() {
                    
                    google.maps.event.addDomListener(window, 'load', init);
                    
                    function init() {
                    
                        var mapOptions = {
                            zoom: 14,
                            center: new google.maps.LatLng('29.8143293','-95.8252876'), 
                            styles: [
            {
                "elementType": "geometry",
                "stylers": [
                    {
                        "hue": "#ff4400"
                    },
                    {
                        "saturation": -68
                    },
                    {
                        "lightness": -4
                    },
                    {
                        "gamma": 0.72
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.icon"
            },
            {
                "featureType": "landscape.man_made",
                "elementType": "geometry",
                "stylers": [
                    {
                        "hue": "#0077ff"
                    },
                    {
                        "gamma": 3.1
                    }
                ]
            },
            {
                "featureType": "water",
                "stylers": [
                    {
                        "hue": "#00ccff"
                    },
                    {
                        "gamma": 0.44
                    },
                    {
                        "saturation": -33
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "stylers": [
                    {
                        "hue": "#44ff00"
                    },
                    {
                        "saturation": -23
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "hue": "#007fff"
                    },
                    {
                        "gamma": 0.77
                    },
                    {
                        "saturation": 65
                    },
                    {
                        "lightness": 99
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "gamma": 0.11
                    },
                    {
                        "weight": 5.6
                    },
                    {
                        "saturation": 99
                    },
                    {
                        "hue": "#0091ff"
                    },
                    {
                        "lightness": -86
                    }
                ]
            },
            {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [
                    {
                        "lightness": -48
                    },
                    {
                        "hue": "#ff5e00"
                    },
                    {
                        "gamma": 1.2
                    },
                    {
                        "saturation": -23
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "saturation": -64
                    },
                    {
                        "hue": "#ff9100"
                    },
                    {
                        "lightness": 16
                    },
                    {
                        "gamma": 0.47
                    },
                    {
                        "weight": 2.7
                    }
                ]
            }
        ] };
                    
                        var mapElement = document.getElementById('map');
                        var map = new google.maps.Map(mapElement, mapOptions);
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng('29.8143293','-95.8252876'),
                            map: map,
                            title: 'Snazzy!'
                        });
                    }   
                    
                    });
                        
                </script>
                
            </x-frontend.pieces.ad_frame>

        </aside>
        
    </div>




    <div class="separation h-50p"></div>

</main>

@endsection


