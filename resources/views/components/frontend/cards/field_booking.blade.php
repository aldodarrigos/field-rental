<div class="rounded-lg">

    <div class="bg-{{$bg}} text-white px-10 py-7 rounded-lg min-h-400p">

        <div class="">
            <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
            <h1 class="text-white font-roboto text-2x5 uppercase font-bold leading-none mb-2">{{$title}}</h1>
            <div class="grid grid-cols-3 mb-4">
                <div class="">
                    <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">Date</div>
                    <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$date}}</div>
                </div>
                <div class="">
                    <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">Hour</div>
                    <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$hour}}</div>
                </div>
                <div class="">
                    <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">Price</div>
                    <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$price}}</div>
                </div>

            </div>
        </div>

        <div class="text-{{$sumary_color}} mb-6">
            {{$sumary}}
        </div>

        @if (isset(Auth::user()->name))

            {{$slot}}

            <br>

            <div class="text-center font-bold flex items-center justify-center gap-2">
                <input type="checkbox" name="" id="agree" class="h-5 w-5 text-red"> <span class="">I agree to Katy ISC terms and conditions</span>
            </div>

            <br>
            
            <div class="">

                
                <div class="text-center">
                    <button type="submit" id='save' class=" bg-graytext font-roboto text-gray font-bold rounded py-3 px-8 uppercase text-lg hover:bg-deepblue ease-in-out duration-300" disabled>Confirm and Pay <i class="far fa-credit-card"></i>
                    </button>
                </div>

                <img class="w-200p ml-auto mr-auto" src="https://katyisc.com/storage/files/paypal-button.png" alt="">
                
            </div>

            

            

        @else

            <div>Please <a href="/signin" class="font-bold text-red">login</a> to your account to complete booking or <a href="/signup" class="font-bold text-red">create</a> a new account</div>
            
        @endif

    </div>
</div>
