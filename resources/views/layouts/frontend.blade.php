 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KatyISC</title>
    
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}" sizes="32x32">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw8jIYGfwQC1fUdni4PlUws3tQa21EjdM"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    @livewireStyles
    @section('assets_up') @show

</head>

<body class="bg-gray">

    <livewire:top-nav></livewire:top-nav>
    @include('partials.frontend.mainnav')

    @yield('content')

    @include('partials.frontend.footer')

    <script src="{{ mix('js/app.js') }}"></script> 
    @livewireScripts

    
    @section('assets_down') @show
        
</body>

</html>
