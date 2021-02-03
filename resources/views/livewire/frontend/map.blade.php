<div class="flex rounded-lg h-auto md:h-500p flex-col-reverse md:flex-row">
    <div class="w-4/4 md:w-3/4 h-500p md:h-auto">

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
        
    </div>
    <div class="w-4/4 md:w-1/4 bg-deepblue text-white px-10 py-16">
        <div class="text-red uppercase font-roboto font-bold">Location</div>    
        <div class="text-white font-roboto text-3xl uppercase font-bold leading-none mb-2 mt-2">Where we are</div>
        <div class="text-white mb-6">
            <div class="text-lg text-red font-bold mb-2">{{$setting->location}}</div>
            <div class="text-base text-white font-semibold mb-1">{{$setting->open_admin}}</div>
            <div class="text-base text-white font-semibold mb-1">{{$setting->open}}</div>
            <div class="text-base text-white font-semibold mb-1">{{$setting->email}}</div>
            <div class="text-base text-white font-semibold mb-1">{{$setting->phone_1}}</div>
            <div class="text-base text-white font-semibold mb-1">{{$setting->phone_2}}</div>
        </div>
    </div>
</div>