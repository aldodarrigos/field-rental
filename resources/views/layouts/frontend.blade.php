 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['sumary']}}">

    <meta property='og:type' content='website' />
    <meta property='og:title' content='{{$seo['title']}}' />
    <meta property='og:description' content='{{$seo['sumary']}}' />
    <meta property='og:image' content='{{$seo['image']}}' />

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw8jIYGfwQC1fUdni4PlUws3tQa21EjdM"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F3HLVMGXMT"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-F3HLVMGXMT');
    </script>

    @livewireStyles
    @section('assets_up') @show

</head>

<body class="bg-gray">

    <livewire:frontend.top-nav></livewire:frontend.top-nav>
    @include('partials.frontend.mainnav')

    @yield('content')

    @include('partials.frontend.footer')

    <script src="{{ mix('js/app.js') }}"></script> 
    @livewireScripts

    
    @section('assets_down') @show
        
</body>

</html>
