@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Covid-19 Protocol' bread='Safety First'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-80p"></div>
            
    <div class="mb-12 grid grid-cols-1 gap-6">

        @foreach ($content as $item)
            <div>
                <h2 class="bg-blue inline-block px-4 py-2 text-white font-bold border-red border-l-8 mb-2"><i class="{{$item->icon}} mr-1"></i> {{$item->title}}</h2>
                {!!$item->content!!} 
            </div>
        @endforeach
      
    </div>

    <div class="separation h-50p"></div>

</main>

@endsection


