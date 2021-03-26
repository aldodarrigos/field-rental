@php
    $reservations_active = ($url == 'reservations')?'active':'';
    $content_active = ($url == 'content')?'active':'';
    $fields_active = ($url == 'fields')?'active':'';
    $services_active = ($url == 'services')?'active':'';
    $news_active = ($url == 'news')?'active':'';
    $gallery_active = ($url == 'gallery')?'active':'';
    $menu_active = ($url == 'menu')?'active':'';
    $settings_active = ($url == 'settings')?'active':'';
    $users_active = ($url == 'users')?'active':'';
    $slides_active = ($url == 'slides')?'active':'';
    $competitions_active = ($url == 'competitions')?'active':'';
    $store_active = ($url == 'store')?'active':'';


    //$active = ($link == '/'.Request::segment(1))?'bg-blue text-white':'text-graytext';


@endphp

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">

            <li class="nav-header">
                <div class="dropdown profile-element" style="display: flex; grid-gap: .5rem;">
                    <img alt="image" class="" src="https://xava.pro/storage/offtopic/kisc-logo-200.webp" style='width: 40px; height: 40px;'>
                    <span style='display: inline-block;'>
                        <span class="block m-t-xs font-bold text-white">{{Auth::user()->name}}</span>
                        <span class="text-muted text-xs block">Admin</span>
                    </span>
                </div>
                <div class="logo-element">
                    KSC
                </div>
            </li>

            <li class='{{$reservations_active}}'>
                <a href="/booking"><i class="fas fa-book"></i> <span class="nav-label">Booking</span> </a>
            </li>

            <li class="{{$content_active}}">
                <a href="/content"><i class="fas fa-feather-alt"></i> <span class="nav-label">Content</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/content">Dashboard</a></li>
                    <li><a href="/content-groups">Groups</a></li>
                </ul>
            </li>

            <li class="{{$fields_active}}">
                <a href="/backend-fields"><i class="fas fa-vector-square"></i> <span class="nav-label">Fields</span> </a>
            </li>

            <li class="{{$services_active}}">
                <a href="/backend-services"><i class="fas fa-briefcase"></i> <span class="nav-label">Services</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/backend-services">Services</a></li>
                    <li><a href="/bservices-registration">Registration</a></li>
                    <li><a href="/bservices-contact">Contact</a></li>
                    <li><a href="/summerclin">Summer Clinics</a></li>
                </ul>
            </li>


            <li class="{{$competitions_active}}">
                <a href="/competitions"><i class="fas fa-trophy"></i> <span class="nav-label">Competitions</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/competitions">Competitions</a></li>
                    <li><a href="/categories">Categories</a></li>
                    <li><a href="/competition-reg-dashboard">Registration</a></li>
                    <li><a href="/teams-dashboard">Teams</a></li>
                    <li><a href="/tryouts-dashboard">Tryouts</a></li>
                    <li><a href="/competitions-contact">Contact</a></li>
                </ul>
            </li>

            <li class="{{$news_active}}">
                <a href="/backend-news"><i class="fas fa-rss"></i> <span class="nav-label">News</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/backend-news">Posts</a></li>
                    <li><a href="/backend-tags">Tags</a></li>
                </ul>
            </li>

            <li class="{{$gallery_active}}">
                <a href="/gallery"><i class="far fa-images"></i> <span class="nav-label">Gallery</span> </a>
            </li>


            <li class="{{$store_active}}">
                <a href="/store"><i class="fas fa-shopping-cart"></i> <span class="nav-label">Shop</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/store">Products</a></li>
                    <li><a href="/sizes">Sizes</a></li>
                </ul>
            </li>

            <li class="{{$users_active}}">
                <a href="/users"><i class="fas fa-users"></i> <span class="nav-label">Users</span> </a>
            </li>

            
            <li class="{{$settings_active}}">
                <a href="/backend-news"><i class="fas fa-sliders-h"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/settings/1/edit">Global settings</a></li>
                    <li><a href="/menu">Menu</a></li>
                    <li><a href="/slides">SlideShow</a></li>
                    <li><a href="/waiver">Waiver</a></li>
                    <li><a href="/field-rules">Field Rules</a></li>
                </ul>
            </li>

        </ul>

    </div>
</nav>