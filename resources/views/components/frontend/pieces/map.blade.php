<div class="flex rounded-lg h-auto md:h-500p flex-col-reverse md:flex-row">
    <div class="w-4/4 md:w-3/4 h-500p md:h-auto">

        <div id="map" class="h-500p w-full inline-block"></div>

        <script> 
    
            document.addEventListener('DOMContentLoaded', function() {
            
            google.maps.event.addDomListener(window, 'load', init);
            
            function init() {
            
                var mapOptions = {
                    zoom: 17,
                    center: new google.maps.LatLng('29.758156533285963','-95.81270178038876'), 
                    };
       
                var mapElement = document.getElementById('map');
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng('29.758156533285963','-95.81270178038876'),
                    map: map,
                    title: 'KISC Sports Complex - 2029 Pecan Ln, Katy, TX 77494'
                });
            }   
            
            });
                
        </script>
        
    </div>
    <div class="w-4/4 md:w-1/4 bg-deepblue text-white px-20 py-16">
        <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
        <div class="text-white font-roboto text-3xl uppercase font-bold leading-none mb-4 mt-2">{{$title}}</div>
        <div class="text-graytext mb-6">
            {{$sumary}}
        </div>
    </div>
</div>