@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='About' bread='What we do'></x-frontend.pieces.section_header>

<div class="separation h-50p"></div>

<div class="w-11/12 md:w-boxed mx-auto">

    <x-frontend.pieces.bigshow_dual_flat>
        <x-slot name='image'>https://images.unsplash.com/photo-1490108474814-221f6198acc5</x-slot>
        <x-slot name='title'>Mision</x-slot>
        <x-slot name='bg'>blue</x-slot>
        <x-slot name='text_color'>gray</x-slot>
        <x-slot name='order'>image_info</x-slot>
        
        <p>Promote and lead the sports practice of soccer for the families of the city of Katy through innovation, quality and service. All our resources are aimed at contributing to the development of the physical health of our clients and to promote the values and integration between our members, allowing us to exceed your expectations at all times.</p>

        <p>Impulsar y liderar la práctica deportiva del futbol de las familias de la ciudad de Katy a través de la innovación, calidad y servicio. Todos nuestros recursos están orientados a contribuir con el desarrollo de la salud física de nuestros clientes y a promover los valores y la integración entre nuestros miembros, permitiéndonos superar sus expectativas en todo momento.</p>
    </x-frontend.pieces.bigshow_dual_flat>

    <x-frontend.pieces.bigshow_dual_flat>
        <x-slot name='image'>https://images.unsplash.com/photo-1607417308034-2e428e3c53d7</x-slot>
        <x-slot name='title'>Vision</x-slot>
        <x-slot name='bg'>white</x-slot>
        <x-slot name='text_color'>black</x-slot>
        <x-slot name='order'>info_image</x-slot>

        <p>To be the leading company in the sports industry in all of Houston, recognized also nationwide for providing high quality services and technology for the practice of sport both at a competitive, educational and recreational. Committed to offering solutions to support the various needs of our clients using state-of-the-art technology and a high quality service.</p>
        <p>Impulsar y liderar la práctica deportiva del futbol de las familias de la ciudad de Katy a través de la innovación, calidad y servicio. Todos nuestros recursos están orientados a contribuir con el desarrollo de la salud física de nuestros clientes y a promover los valores y la integración entre nuestros miembros, permitiéndonos superar sus expectativas en todo momento.</p>
    </x-frontend.pieces.bigshow_dual_flat>

    <x-frontend.pieces.bigshow_dual_flat>
        <x-slot name='image'>https://images.unsplash.com/photo-1591647598839-c9696a6305ee</x-slot>
        <x-slot name='title'>Values</x-slot>
        <x-slot name='bg'>blue</x-slot>
        <x-slot name='text_color'>gray</x-slot>
        <x-slot name='order'>image_info</x-slot>

        <p><strong>Commitment</strong>: We undertake transparent actions aimed at preserving the well-being of our clients and the environment.</p>
        <p><strong>Quality and Innovation</strong>, We are in the constant search for excellence to always provide the best to our clients.</p>
        <p><strong>Well-being:</strong> We offer an extensive sports program that helps us promote a healthy lifestyle and a warm relationship among the members of our club.</p>
        <p><strong>Empathy</strong>: We promote a culture of empathetic and friendly service, our clients are the most important.</p>

    </x-frontend.pieces.bigshow_dual_flat>

    <div class="separation h-50p"></div>

    <div class="mb-8">

        <div class="col-span-12">
            <div class="font-bold text-xl bg-blue text-white px-6 py-1 inline-block border-l-8 border-red mb-2">Our Team</div>
            <p>Professionals with extensive experience in developing Soccer programs as well as in conducting tournaments at all levels.</p>

        </div>
        <div class="col-span-12 grid grid-cols-12 gap-8">

            <div class="col-span-12 md:col-span-2">
                <div class="img ">
                    <div class="w-150p h-150p mx-auto mb-2">
                        <img class="rounded-full object-cover w-full h-full" src="https://images.unsplash.com/photo-1519474072549-535cde8b7e7d" alt="">
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-bold">Pet Bronson</div>
                    <div class="text-red font-bold">Coach</div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-2">
                <div class="img ">
                    <div class="w-150p h-150p mx-auto mb-2">
                        <img class="rounded-full object-cover w-full h-full" src="https://images.unsplash.com/photo-1584725611968-b5f8a6c7435d" alt="">
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-bold">Jason Kast</div>
                    <div class="text-red font-bold">Coach</div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-2">
                <div class="img ">
                    <div class="w-150p h-150p mx-auto mb-2">
                        <img class="rounded-full object-cover w-full h-full" src="https://images.unsplash.com/photo-1420316078344-6149cb82b2c7" alt="">
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-bold">Pat Ramos</div>
                    <div class="text-red font-bold">Coach</div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-2">
                <div class="img ">
                    <div class="w-150p h-150p mx-auto mb-2">
                        <img class="rounded-full object-cover w-full h-full" src="https://images.unsplash.com/photo-1486274613518-b260a67b38ba" alt="">
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-bold">Robert Cranson</div>
                    <div class="text-red font-bold">Coach</div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-2">
                <div class="img ">
                    <div class="w-150p h-150p mx-auto mb-2">
                        <img class="rounded-full object-cover w-full h-full" src="https://images.unsplash.com/photo-1517466787929-bc90951d0974" alt="">
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-bold">Michael Cruice</div>
                    <div class="text-red font-bold">Coach</div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-2">
                <div class="img ">
                    <div class="w-150p h-150p mx-auto mb-2">
                        <img class="rounded-full object-cover w-full h-full" src="https://images.unsplash.com/photo-1598587409999-40cb3ca06135" alt="">
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-bold">Steve Chang</div>
                    <div class="text-red font-bold">Coach</div>
                </div>
            </div>

        </div>
    </div>
    
</div>

@endsection


