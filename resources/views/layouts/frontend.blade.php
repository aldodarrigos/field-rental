<?php 
    // This list is for show image seo personalized or generic
    $list_pages_personalized = 
    [
        "frontend.service",
        "event",
        "frontend.post",
        "frontend.tags",
        "frontend.tournament",
        "frontend.league"
    ];

    $seo_image_generic = true;

    for ($i=0; $i < count($list_pages_personalized)  ; $i++) { 
      if (\Illuminate\Support\Facades\Route::is($list_pages_personalized[$i])) {
        $seo_image_generic = false;
        break;
      } 
    }

?>

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
    <meta property='og:image' content='{{$seo_image_generic === true ? \App\Models\Setting::first()->img : $seo['image']}}' />
  

    <link rel="apple-touch-icon" sizes="180x180" href="{{\App\Models\Setting::first()->icon}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{\App\Models\Setting::first()->icon}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{\App\Models\Setting::first()->icon}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    {{-- <link rel="stylesheet" href="{{ mix('js/mapkick.js') }}"> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous">
    </script>  
    
    
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    {{-- <script src="js/mapkick.js"></script> --}}
    {{-- <link href="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.css" rel="stylesheet" />
    <script src="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.js"></script> --}}

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>


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
        


<script>

	jQuery(document).on("click", '.dropdownButtonMobile',function(e)
	{
		e.preventDefault();
		var menu = jQuery(this).next().next().toggleClass('hidden');
		
	});

	jQuery(document).on("mouseenter", '.dropdownButton',function(e)
	{
		e.preventDefault();
		jQuery(this).next().next().css("display", "flex").hide().fadeIn();
		jQuery(this).next().next().next().css("display", "flex");
	});

  jQuery(document).on("click", '.dropdownButton',function(e)
	{
		e.preventDefault();
	});

	jQuery(document).on("mouseleave",".dropdownButton" ,function(e)
	{
		e.preventDefault();
		jQuery(this).next().next().fadeOut();
		jQuery(this).next().next().next().fadeOut();
	});

	jQuery(document).on("mouseenter",".dropdownMenu" ,function(e)
	{
		e.preventDefault();
		jQuery(this).next().stop(true,true).show();
		jQuery(this).stop(true,true).css("display", "flex").show();
	});

	jQuery(document).on("mouseleave",".dropdownMenu" ,function(e)
	{
		e.preventDefault();
		jQuery(this).fadeOut();
		jQuery(this).next().fadeOut();
	});
</script>
</body>

</html>
