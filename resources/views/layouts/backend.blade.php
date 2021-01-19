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
