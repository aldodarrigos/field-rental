@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Service Name' bread='Services'></x-frontend.pieces.section_header>

<main class="w-boxed mx-auto">

    <div class="separation h-80p"></div>
            
    <div class=" gap-2 mb-4 bg-deepblue rounded-lg">
        <div class="col-span-6 h-400p">
            <img class="object-cover w-full h-full rounded-l-lg" src="https://images.unsplash.com/photo-1490108474814-221f6198acc5" alt="">
        </div>
        <div class="col-span-6 py-6 px-8 text-gray">
            <div class="font-bold text-xl bg-blue text-white px-6 py-1 inline-block border-l-8 border-red mb-2">Mision</div>
            <p>Promote and lead the sports practice of soccer for the families of the city of Katy through innovation, quality and service. All our resources are aimed at contributing to the development of the physical health of our clients and to promote the values and integration between our members, allowing us to exceed your expectations at all times.</p>
            <p>Impulsar y liderar la práctica deportiva del futbol de las familias de la ciudad de Katy a través de la innovación, calidad y servicio. Todos nuestros recursos están orientados a contribuir con el desarrollo de la salud física de nuestros clientes y a promover los valores y la integración entre nuestros miembros, permitiéndonos superar sus expectativas en todo momento.</p>
        </div>
    </div>

    <div class="separation h-50p"></div>

</main>

@endsection


