@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='About' bread='What we do'></x-frontend.pieces.section_header>

<div class="separation h-50p"></div>

<div class="w-11/12 md:w-boxed mx-auto">
    <div class="bg-white px-8 py-8 rounded-lg">
        <h2 class="bg-blue inline-block px-4 py-2 text-white font-bold border-red border-l-8 mb-2">{{$intro->title}}</h2>
        {!!$intro->content!!}
    </div>
</div>

<div class="separation h-50p"></div>

<div class="content flex rounded-lg h-auto flex-col-reverse md:flex-row w-11/12 md:w-boxed mx-auto">

    <div class="w-4/4 md:w-3/4">
        <img class="max-w-full rounded-l-lg" src="{{$fields->img}}" alt="">
    </div>
    <div class="w-4/4 md:w-1/4 bg-deepblue text-white px-10 py-10 rounded-r-lg">
        <div class="text-red uppercase font-roboto font-bold">{{$fields->subtitle}}</div>    
        <div class="text-white font-roboto text-3xl uppercase font-bold leading-none mb-4 mt-2">{{$fields->title}}</div>
        <div class="text-white mb-6 list-disc">

            {!!$fields->content!!}

            <a href="/fieldsrental" class="bg-red font-roboto text-gray font-bold rounded py-2 px-4 uppercase text-sm hover:bg-deepblue ease-in-out duration-300">Rent now <i class="far fa-calendar-alt text-md pl-1 mt-6"></i></a>
        </div>
    </div>
</div>

<div class="separation h-50p"></div>

<div class="w-11/12 md:w-boxed mx-auto">

    <x-frontend.pieces.bigshow_dual_flat>
        <x-slot name='image'>{{$mision->img}}</x-slot>
        <x-slot name='title'>{{$mision->title}}</x-slot>
        <x-slot name='bg'>blue</x-slot>
        <x-slot name='text_color'>gray</x-slot>
        <x-slot name='order'>image_info</x-slot>
        {!!$mision->content!!}

    </x-frontend.pieces.bigshow_dual_flat>

    <x-frontend.pieces.bigshow_dual_flat>
        <x-slot name='image'>{{$vision->img}}</x-slot>
        <x-slot name='title'>{{$vision->title}}</x-slot>
        <x-slot name='bg'>white</x-slot>
        <x-slot name='text_color'>black</x-slot>
        <x-slot name='order'>info_image</x-slot>

        {!!$vision->content!!}
    </x-frontend.pieces.bigshow_dual_flat>

    <x-frontend.pieces.bigshow_dual_flat>
        <x-slot name='image'>{{$values->img}}</x-slot>
        <x-slot name='title'>{{$values->title}}</x-slot>
        <x-slot name='bg'>blue</x-slot>
        <x-slot name='text_color'>gray</x-slot>
        <x-slot name='order'>image_info</x-slot>

        {!!$values->content!!}

    </x-frontend.pieces.bigshow_dual_flat>

    <div class="separation h-50p"></div>

    <div class="mb-8 hidden">

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


