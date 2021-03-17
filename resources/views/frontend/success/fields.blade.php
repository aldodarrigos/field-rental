@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Successful booking' bread='Booking'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <div class="col-span-6">
            @php
            
                $reservations = session()->get('reservation');
                $field = session()->get('field');
                $user = session()->get('user');
                $paypal_code = session()->get('paypal_code');
                $code = session()->get('code');
                $field_players_number = ($field->tag_id == 1)?'5 vs 5 players (6 vs 6)':'7 vs 7 players (9 vs 9)';
                
            @endphp


            <div class="rounded-lg">

                <div class="bg-blue text-white px-10 py-7 rounded-lg min-h-400p">

                    <div class="">
                        <div class="text-red uppercase font-roboto font-bold">{{$field_players_number}}</div>    
                        <h1 class="text-white font-roboto text-2x5 uppercase font-bold leading-none mb-2">{{$field->number.'. '.$field->name}}</h1>
                        <h2 class="text-info font-roboto text-4xl uppercase font-bold leading-none mt-2 mb-4">Successful booking!</h2>

                        <div class="mt-4">
                            <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">User</div>
                            <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$user->name}}</div>
                        </div>
                        
                        @foreach ($reservations as $item)

                        <div class="grid grid-cols-3">
                            <div class="">
                                <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">Date</div>
                                <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{date('M d, Y', strtotime($item->res_date))}}</div>
                            </div>
                            <div class="">
                                <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">Hour</div>
                                <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$item->hour}}</div>
                            </div>
                            <div class="">
                                <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">Price</div>
                                <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">${{$item->price}}</div>
                            </div>
                        </div>

                        @endforeach

                        <div class="mt-4">
                            <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">PayPal Code</div>
                            <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$paypal_code}}</div>
                        </div>
                        <div class="mt-4">
                            <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">Reservation Code</div>
                            <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$code}}</div>
                        </div>

                    </div>
                </div>
            </div>

        </div>



    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


