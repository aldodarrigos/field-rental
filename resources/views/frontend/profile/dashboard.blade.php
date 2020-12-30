@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='Profile' bread='Dashboard'></x-frontend.pieces.section_header>


<main class="w-11/12 md:w-boxed mx-auto">

    <div class="separation h-50p"></div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <div class="col-span-12">

            <div class="profile flex gap-4 mb-6">
                <div class="info">
                    <div class="name text-2x font-bold flex">{{Auth::user()->name}} 
                        <form method="POST" action="/logout">
                            @csrf
                            <a class="text-red text-lg ml-1" href="/logout"
                            onclick="event.preventDefault(); this.closest('form').submit();"> (Logout)</a>
                        </form>
                    </div>
                    <div class="item"><span class="font-bold">Email: </span> {{$user->email}}
                    </div>
                    <div class="item"><span class="font-bold">Status: </span>  User registered</div>
                    <div class="item"><span class="font-bold">Registered since: </span> {{date('Y-m-d', strtotime($user->created_at))}}</div>
                </div>
            </div>


            
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            User</th>
                        <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Reservation</th>
                        <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Date</th>
                        
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach ($reservations as $item)

                    @php
                        $date = new DateTime($item->res_date);
                        $now = new DateTime();
                        $status = 'Pending';
                        $status_bg = 'info';
                        if($date < $now) {
                            $status = 'Finished';
                            $status_bg = 'graytext';
                        }
                    @endphp
                        
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img src="{{ Avatar::create(Auth::user()->name)->setFontFamily('arial')->toBase64() }}" />
                                </div>

                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">{{Auth::user()->name}}
                                    </div>
                                    <div class="text-sm leading-5 text-gray-500">User registered</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                            <div class="text-sm leading-5 text-gray-900">{{$item->field_name}}</div>
                            <div class="text-sm leading-5 text-gray-500"></div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                            <span class="px-2 inline-flex text-xs uppercase leading-5 font-semibold rounded-md bg-{{$status_bg}} text-white py-1">{{$status}}</span>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext text-sm leading-5 text-gray-500">
                            {{$item->res_date}} {{$item->hour}}</td>

                    </tr>

                    @endforeach

                </tbody>
            </table>
            
        </div>
    </div>
    

    <div class="separation h-50p"></div>

</main>

@endsection


