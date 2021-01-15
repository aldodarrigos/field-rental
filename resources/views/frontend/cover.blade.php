@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<livewire:frontend.cover-bigshow></livewire:frontend.cover-bigshow>

<div class="separation h-50p"></div>


<div class="w-11/12 md:w-boxed mx-auto">
    <livewire:frontend.cover-about></livewire:frontend.cover-about>
</div>

<div class="separation h-100p"></div>

<livewire:frontend.cover-services></livewire:frontend.cover-services>

<div class="separation h-100p"></div>

<livewire:frontend.cover-cards-highlights></livewire:frontend.cover-cards-highlights>

<div class="separation h-100p"></div>

<livewire:frontend.cover-soccer-academy></livewire:frontend.cover-soccer-academy>

<div class="separation h-100p"></div>

<livewire:frontend.cover-news></livewire:frontend.cover-news>

<div class="separation h-100p"></div>

@include('partials.frontend.map')

@endsection


