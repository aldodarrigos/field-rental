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
                <a href="/backend-booking"><i class="fas fa-book"></i> <span class="nav-label">Booking</span> </a>
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
                <a href="/backend-services"><i class="far fa-folder"></i> <span class="nav-label">Services</span> </a>
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

            <li class="{{$users_active}}">
                <a href="/users"><i class="fas fa-users"></i> <span class="nav-label">Users</span> </a>
            </li>

            
            <li class="{{$slides_active}}">
                <a href="/backend-news"><i class="fas fa-sliders-h"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/settings/1/edit">Global settings</a></li>
                    <li><a href="/menu">Menu</a></li>
                    <li><a href="/slides">SlideShow</a></li>
                </ul>
            </li>

        </ul>

    </div>
</nav>