<div class="rounded-lg">

    <div class="bg-blue text-white px-10 py-7 rounded-lg min-h-400p">

        <div class="">
            <div class="text-red uppercase font-roboto font-bold">{{$subtitle}}</div>    
            <h1 class="text-white font-roboto text-2x5 uppercase font-bold leading-none mb-2">{{$title}}</h1>
            <h2 class="text-info font-roboto text-4xl uppercase font-bold leading-none mt-2">Successful booking!</h2>
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

            <div>
                <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">User</div>
                <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$user}}</div>
            </div>
            <div class="mt-4">
                <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">PayPal Code</div>
                <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$paypalcode}}</div>
            </div>
            <div class="mt-4">
                <div class="font-roboto text-lg uppercase font-bold leading-none mb-2 mt-2">Reservation Code</div>
                <div class="font-roboto text-xl uppercase font-bold leading-none mb-2 mt-2 text-warning">{{$code}}</div>
            </div>

        </div>
    </div>
</div>
