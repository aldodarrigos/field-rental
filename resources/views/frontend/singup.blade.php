@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Fields' bread='Our fields'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <div class="col-span-12 md:col-span-6">
            <form action="" method="POST" id='bookform'>

            <div class="flex gap-4 flex-col md:flex-row mb-2">
                
                <div class="w-2/2 md:w-1/2">
                    <x-frontend.forms.input_text>
                        <x-slot name='type'>input</x-slot>
                        <x-slot name='label'>Name</x-slot>
                        <x-slot name='id'>name</x-slot>
                        <x-slot name='default'></x-slot>
                        <x-slot name='placeholder'>Name</x-slot>
                        <x-slot name='autocomplete'>off</x-slot>
                        <x-slot name='required'>on</x-slot>
                        <x-slot name='height'>big</x-slot>
                        <x-slot name='bg'>light</x-slot>
                        <x-slot name='label_on_off'>on</x-slot>
                    </x-frontend.forms.input_text>
                </div>
                <div class="w-2/2 md:w-1/2">
                    <x-frontend.forms.input_text>
                        <x-slot name='type'>input</x-slot>
                        <x-slot name='label'>Last Name</x-slot>
                        <x-slot name='id'>lastname</x-slot>
                        <x-slot name='default'></x-slot>
                        <x-slot name='placeholder'>Last name</x-slot>
                        <x-slot name='autocomplete'>off</x-slot>
                        <x-slot name='required'>on</x-slot>
                        <x-slot name='height'>big</x-slot>
                        <x-slot name='bg'>light</x-slot>
                        <x-slot name='label_on_off'>on</x-slot>
                    </x-frontend.forms.input_text>
                </div>
            
            </div>  
            
            <div class="mb-4">
                <x-frontend.forms.input_text>
                    <x-slot name='type'>email</x-slot>
                    <x-slot name='label'>Email</x-slot>
                    <x-slot name='id'>email</x-slot>
                    <x-slot name='default'></x-slot>
                    <x-slot name='placeholder'>johndoe@mail.com</x-slot>
                    <x-slot name='autocomplete'>off</x-slot>
                    <x-slot name='required'>on</x-slot>
                    <x-slot name='height'>big</x-slot>
                    <x-slot name='bg'>light</x-slot>
                    <x-slot name='label_on_off'>on</x-slot>
                </x-frontend.forms.input_text>
            </div>
            
            <div class="mb-4">
                <x-frontend.forms.input_text>
                    <x-slot name='type'>password</x-slot>
                    <x-slot name='label'>Password</x-slot>
                    <x-slot name='id'>password</x-slot>
                    <x-slot name='default'></x-slot>
                    <x-slot name='placeholder'></x-slot>
                    <x-slot name='autocomplete'>off</x-slot>
                    <x-slot name='required'>on</x-slot>
                    <x-slot name='height'>big</x-slot>
                    <x-slot name='bg'>light</x-slot>
                    <x-slot name='label_on_off'>on</x-slot>
                </x-frontend.forms.input_text>
            </div>
            
            <div class="mb-4">
                <x-frontend.forms.input_text>
                    <x-slot name='type'>password</x-slot>
                    <x-slot name='label'>Confirm password</x-slot>
                    <x-slot name='id'>password_confirm</x-slot>
                    <x-slot name='default'></x-slot>
                    <x-slot name='placeholder'></x-slot>
                    <x-slot name='autocomplete'>off</x-slot>
                    <x-slot name='required'>on</x-slot>
                    <x-slot name='height'>big</x-slot>
                    <x-slot name='bg'>light</x-slot>
                    <x-slot name='label_on_off'>on</x-slot>
                </x-frontend.forms.input_text>
            </div>


            <div class="text-right py-4">
                <x-frontend.buttons.form>
                    <x-slot name='bg'>red</x-slot>
                    <x-slot name='size'>big</x-slot>
                    <x-slot name='text'>Sing Up <i class="fas fa-caret-right"></i></x-slot>
                    <x-slot name='class'></x-slot>
                    <x-slot name='id'></x-slot>
                </x-frontend.buttons.form>

     
            </div>
            </form>
            
            
        </div>
        <div class="col-span-6">

        </div>



    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


