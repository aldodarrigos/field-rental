<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KatyISC | Admin</title>
    
    <link href="{{asset('inspinia/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">

    <link href="{{asset('inspinia/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/style.css')}}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body>

<div id="wrapper">

    @include('partials.backend.leftnav')

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            @include('partials.backend.topnav')
        </div>

        @yield('content')

        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('inspinia/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('inspinia/js/popper.min.js')}}"></script>
<script src="{{asset('inspinia/js/bootstrap.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('inspinia/js/inspinia.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/pace/pace.min.js')}}"></script>

@section('assets_down') @show

</body>

</html>
