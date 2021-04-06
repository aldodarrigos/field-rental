@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    
@endsection

<x-frontend.pieces.section_header title='Soccer TV' bread='Streaming'></x-frontend.pieces.section_header>

<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-12 gap-8">

        rtsp://admin:Gt514865*@50.213.160.94:554/streaming/channels/101
        
    </div>

    <div class="separation h-50p"></div>

</main>

@endsection


