@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<livewire:big-show></livewire:big-show>

<div class="separation h-50p"></div>

<livewire:cover-about></livewire:cover-about>

<div class="separation h-100p"></div>

<livewire:cover-services></livewire:cover-services>

<div class="separation h-100p"></div>

<div class="">
    <div class="w-11/12 md:w-boxed mx-auto">
        <div class="flex gap-8 flex-col md:flex-row">
            <div class="w-3/3 md:w-1/3">
                <livewire:cover-soccer-tv></livewire:cover-soccer-tv>
            </div>
            <div class="w-3/3 md:w-1/3">
                <livewire:cover-covid></livewire:cover-covid>
            </div>
            <div class="w-3/3 md:w-1/3">
                <livewire:cover-soccer-fun></livewire:cover-soccer-fun>
            </div>
        </div>
    </div>
</div>

<div class="separation h-100p"></div>

<livewire:cover-soccer-academy></livewire:cover-soccer-academy>

<div class="separation h-100p"></div>

<livewire:cover-news></livewire:cover-news>

<div class="separation h-100p"></div>

@include('partials.frontend.map')

@endsection


