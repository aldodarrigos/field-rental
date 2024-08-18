<div class="flex rounded-lg h-auto md:h-500p flex-col-reverse md:flex-row">
    <div class="w-4/4 md:w-3/4 h-500p md:h-auto">

        <div id="map" class="h-500p w-full inline-block z-0"></div>

        {{-- <iframe class="h-500p w-full inline-block" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.0616657675714!2d-95.81380091800925!3d29.758422517291727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8641276fca3d8647%3A0xf3fe2efafd76f431!2sKaty%20International%20Sports%20Complex!5e0!3m2!1sen!2snz!4v1723520863085!5m2!1sen!2snz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
        <script> 
            document.addEventListener('DOMContentLoaded', function() {
                var map = L.map('map').setView(['{{$setting->latitude}}', '{{$setting->longitude}}'], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'}).addTo(map);
                var marker = L.marker(['{{$setting->latitude}}', '{{$setting->longitude}}']).addTo(map);
                marker.bindPopup(`
                    <img class="" src='https://katyisc.com/storage/files/KatyISC-logo-Black-big.png' />
                    <strong class='text-blue text-center  block'>2029 Pecan Ln, Katy</strong>
                    <strong class='text-blue text-center  block'>TX 77494</strong>
                `).openPopup();

            // new Mapkick.Map("map", [{latitude:'{{$setting->latitude}}', longitude:'{{$setting->longitude}}'}])

            // google.maps.event.addDomListener(window, 'load', init);
            //     function init() {
                    
            //         var mapOptions = {
            //             zoom: 13,
            //             // center: {
            //             //     lat:'{{$setting->latitude}}',
            //             //     lng:'{{$setting->longitude}}'
            //             // }
            //             center: new google.maps.LatLng('{{$setting->latitude}}','{{$setting->longitude}}'), 
            //             };
        
            //         var mapElement = document.getElementById('map');
            //         var map = new google.maps.Map(mapElement, mapOptions);
            //         var marker = new google.maps.Marker({
            //             position: new google.maps.LatLng('{{$setting->latitude}}','{{$setting->longitude}}'),
            //             map: map,
            //             title: '{{$setting->location}}'
            //         });
            //     }   
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