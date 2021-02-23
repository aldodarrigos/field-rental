<x-frontend.pieces.ad_frame title='Location'>
    <x-slot name='frame_icon'><i class="fas fa-map-marker-alt"></i></x-slot>
    <x-slot name='bg'>white</x-slot>

    <div id="map" class="h-500p w-full inline-block"></div>

    <script> 

        document.addEventListener('DOMContentLoaded', function() {
        
        google.maps.event.addDomListener(window, 'load', init);
        
        function init() {
            
            var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng('{{$setting->latitude}}','{{$setting->longitude}}'), 
                };

            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng('{{$setting->latitude}}','{{$setting->longitude}}'),
                map: map,
                title: '{{$setting->location}}'
            });
        }   
        
        });
            
    </script>
    
</x-frontend.pieces.ad_frame>