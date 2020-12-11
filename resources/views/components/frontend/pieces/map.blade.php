<div class="flex rounded-lg h-500p">
    <div class="w-3/4">

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
        
    </div>
    <div class="w-1/4 bg-deepblue text-white px-20 py-16">
        <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
        <div class="text-white font-roboto text-3xl uppercase font-bold leading-none mb-4 mt-2">{{$title}}</div>
        <div class="text-graytext mb-6">
            {{$sumary}}
        </div>
    </div>
</div>