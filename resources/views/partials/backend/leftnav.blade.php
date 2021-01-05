@php
    $reservations_active = ($url == 'reservations')?'active':'';
@endphp

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">

            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="https://www.shareicon.net/data/256x256/2016/07/26/802008_man_512x512.png" style='width: 60px;'>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" style='display: inline-block;'>
                        <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                        <span class="text-muted text-xs block">Admin</span>
                    </a>
                </div>
                <div class="logo-element">
                    KSC
                </div>
            </li>

            <li class='{{$reservations_active}}'>
                <a href="/backend/reservations"><i class="fas fa-book"></i> <span class="nav-label">Booking</span> </a>
            </li>

            <li class=''>
                <a href="/content"><i class="fas fa-feather-alt"></i> <span class="nav-label">Content</span> </a>
            </li>
            <li>
                <a href="/backend/fields"><i class="fas fa-vector-square"></i> <span class="nav-label">Fields</span> </a>
            </li>
            <li>
                <a href="/backend/services"><i class="far fa-folder"></i> <span class="nav-label">Services</span> </a>
            </li>
            <li>
                <a href="/backend/news"><i class="fas fa-rss"></i> <span class="nav-label">News</span> </a>
            </li>
            <li>
                <a href="/backend/gallery"><i class="far fa-images"></i> <span class="nav-label">Gallery</span> </a>
            </li>
            <li>
                <a href="#"><i class="fas fa-tag"></i> <span class="nav-label">Categories</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="graph_flot.html">Flot Charts</a></li>
                    <li><a href="graph_morris.html">Morris.js Charts</a></li>

                </ul>
            </li>
            <li>
                <a href="/backend/users"><i class="fas fa-users"></i> <span class="nav-label">Users</span> </a>
            </li>
        </ul>

    </div>
</nav>