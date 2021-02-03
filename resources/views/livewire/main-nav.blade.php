@foreach ($links as $link)
    <x-frontend.buttons.navlink link='{{$link->slug}}'>{{$link->name}}</x-frontend.buttons.navlink>
@endforeach

