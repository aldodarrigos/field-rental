@props(['link' => '/', 'submenu' => ''])

@php
    $active = ($link == '/'.Request::segment(1))? 'bg-blue text-white':'text-graytext';
@endphp

@if($submenu->count() > 0)
<li class="mb-2 md:mb-0 relative">
    <a href="{{$link}}" class="{{$active}} dropdownButtonMobile sm:hidden font-roboto font-bold uppercase text-base px-2 py-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300">
        {{$slot}}
        <i class="fa fa-caret-down pl-1"></i>
    </a>
    <a href="{{$link}}" class="{{$active}} hidden dropdownButton sm:inline font-roboto font-bold uppercase  text-base px-2 py-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300">
        {{$slot}}
        <i class="fa fa-caret-down pl-1"></i>
    </a>
    <div class="hidden dropdownMenuMobile bg-white md:absolute text-center right-0 top-14 z-10 mt-2  w-full origin-top-right rounded-md ring-1 ring-black ring-opacity-5 focus:outline-none " 
    role="menu" id="dropdownMenuMobile" aria-orientation="vertical" aria-labelledby="dropdownButtonMobile">
       <div class="w-full relative divide-y divide-cool-gray-200" role="none">
           @foreach($submenu as $item)
           <a href="{{$item->slug}}" class="z-10 block px-4 py-2 font-roboto font-bold text-graytext text-sm uppercase hover:bg-blue hover:text-white" role="menuitem" tabindex="-1" id="menu-item-0">{{$item->name}}</a>
           @endforeach
       </div>
   </div>
    <div class="hidden dropdownMenu md:absolute rounded-md text-center right-0 top-5 z-10 mt-2  w-52 origin-top-right bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none " 
     role="menu" aria-orientation="vertical" aria-labelledby="dropdownButton">
        <div class="w-full relative divide-y divide-cool-gray-300 " role="none">
            @foreach($submenu as $item)
            <a href="{{$item->slug}}" class="z-10 block px-4 py-2  font-bold font-roboto text-graytext text-base uppercase hover:bg-blue hover:text-white" role="menuitem" tabindex="-1" id="menu-item-0">{{$item->name}}</a>
            @endforeach
        </div>
    </div>
    {{-- <div class="layerFull_Overlay w-full h-full  fixed top-32 left-0  bg-blue opacity-50" style="display: none;"></div> --}}
</li>

{{-- <div class="relative">
        <div class="icoNav1"
        style="z-index:-10; position: absolute; top: -20px; right: 0; width: 0; height: 0; border-right: 12px solid transparent; border-top: 12px solid transparent; border-left: 12px solid transparent; border-bottom: 13px solid #FFF;"
        >
        </div>
    </div> --}}
@else
<li class="mb-2 md:mb-0">
    <a href="{{$link}}" class='{{$active}} font-roboto font-bold uppercase  text-base px-2 py-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300'>{{$slot}}</a>
</li>
@endif


