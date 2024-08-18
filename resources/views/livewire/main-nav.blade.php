@foreach ($links as $link)
    <x-frontend.buttons.navlink :submenu='$link->children' link='{{$link->slug}}'>{{$link->name}}</x-frontend.buttons.navlink>
@endforeach