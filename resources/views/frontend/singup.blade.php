@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Sign Up' bread='Registration'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <div class="col-span-6">

            <form method="POST" action="{{ route('register') }}">
                @csrf
    
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="phone" value="{{ __('Phone') }}" />
                    <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                    @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('frontend.login') }}">
                        {{ __('Already registered?') }}
                    </a>
    
                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>

            
        </div>



    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


