@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='OUR SERVICES' bread='Services'></x-frontend.pieces.section_header>

<main class="w-boxed mx-auto">

    <div class="separation h-80p"></div>
            
    <div class="mb-12 grid grid-cols-2 gap-6">
        
        <div class="grid grid-cols-12 gap-4 bg-white rounded-lg p-6">
            <div class="col-span-2 text-black"><i class="fas fa-border-none text-4x"></i></div>
            <div class="col-span-10">
                <div class="text-red uppercase text-base font-bold">Fields rental</div>
                <div class="text-graytext mb-4">Lorem ipsum dolor sit amet cons adipisicing elit. Dolorum aliquam similique, dignissimos molestiae nulla impedit.</div>
                <div><x-frontend.buttons.tags link='/' size='regular'>Read more</x-frontend.buttons.tags></div>
            </div>
        </div>
        
        <div class="grid grid-cols-12 bg-white rounded-lg p-6">
            <div class="col-span-2 text-black"><i class="far fa-futbol text-4x"></i></div>
            <div class="col-span-10">
                <div class="text-red uppercase text-base font-bold">Tournaments</div>
                <div class="text-graytext mb-4">Lorem ipsum dolor sit amet cons adipisicing elit. Dolorum aliquam similique, dignissimos molestiae nulla impedit.</div>
                <div><x-frontend.buttons.tags link='/' size='regular'>Read more</x-frontend.buttons.tags></div>
            </div>
        </div>


        <div class="grid grid-cols-12 gap-4 bg-white rounded-lg p-6">
            <div class="col-span-2 text-black"><i class="far fa-futbol text-4x"></i></div>
            <div class="col-span-10">
                <div class="text-red uppercase text-base font-bold">Soccer Academy</div>
                <div class="text-graytext mb-4">Lorem ipsum dolor sit amet cons adipisicing elit. Dolorum aliquam similique, dignissimos molestiae nulla impedit.</div>
                <div><x-frontend.buttons.tags link='/' size='regular'>Read more</x-frontend.buttons.tags></div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-4 bg-white rounded-lg p-6">
            <div class="col-span-2 text-black"><i class="far fa-user-circle text-4x"></i></div>
            <div class="col-span-10">
                <div class="text-red uppercase text-base font-bold">Membership</div>
                <div class="text-graytext mb-4">Lorem ipsum dolor sit amet cons adipisicing elit. Dolorum aliquam similique, dignissimos molestiae nulla impedit.</div>
                <div><x-frontend.buttons.tags link='/' size='regular'>Read more</x-frontend.buttons.tags></div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-4 bg-white rounded-lg p-6">
            <div class="col-span-2 text-black"><i class="fas fa-running text-4x"></i></div>
            <div class="col-span-10">
                <div class="text-red uppercase text-base font-bold">Summer Clinic</div>
                <div class="text-graytext mb-4">Lorem ipsum dolor sit amet cons adipisicing elit. Dolorum aliquam similique, dignissimos molestiae nulla impedit.</div>
                <div><x-frontend.buttons.tags link='/' size='regular'>Read more</x-frontend.buttons.tags></div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-4 bg-white rounded-lg p-6">
            <div class="col-span-2 text-black"><i class="fas fa-birthday-cake text-4x"></i></div>
            <div class="col-span-10">
                <div class="text-red uppercase text-base font-bold">Events</div>
                <div class="text-graytext mb-4">Lorem ipsum dolor sit amet cons adipisicing elit. Dolorum aliquam similique, dignissimos molestiae nulla impedit.</div>
                <div><x-frontend.buttons.tags link='/' size='regular'>Read more</x-frontend.buttons.tags></div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-4 bg-white rounded-lg p-6">
            <div class="col-span-2 text-black"><i class="fas fa-child text-4x"></i></div>
            <div class="col-span-10">
                <div class="text-red uppercase text-base font-bold">After School</div>
                <div class="text-graytext mb-4">Lorem ipsum dolor sit amet cons adipisicing elit. Dolorum aliquam similique, dignissimos molestiae nulla impedit.</div>
                <div><x-frontend.buttons.tags link='/' size='regular'>Contact</x-frontend.buttons.tags></div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-4 bg-white rounded-lg p-6">
            <div class="col-span-2 text-black"><i class="fas fa-video text-4x"></i></div>
            <div class="col-span-10">
                <div class="text-red uppercase text-base font-bold">Soccer TV</div>
                <div class="text-graytext mb-4">Lorem ipsum dolor sit amet cons adipisicing elit. Dolorum aliquam similique, dignissimos molestiae nulla impedit.</div>
                <div><x-frontend.buttons.tags link='/' size='regular'>Contact</x-frontend.buttons.tags></div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-4 bg-white rounded-lg p-6">
            <div class="col-span-2 text-black"><i class="fas fa-users text-4x"></i></div>
            <div class="col-span-10">
                <div class="text-red uppercase text-base font-bold">Soccer Fun park</div>
                <div class="text-graytext mb-4">Lorem ipsum dolor sit amet cons adipisicing elit. Dolorum aliquam similique, dignissimos molestiae nulla impedit.</div>
                <div><x-frontend.buttons.tags link='/' size='regular'>Contact</x-frontend.buttons.tags></div>
            </div>
        </div>

    </div>

    <div class="separation h-50p"></div>

</main>

@endsection


