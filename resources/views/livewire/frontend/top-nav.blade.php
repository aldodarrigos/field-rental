<div class="bg-deepblue text-graytext fixed w-full z-30 top-0">
    <div class="w-full md:w-boxed max-w-boxed mx-auto h-40 flex items-center px-4 sm:px-0">
        <div class="social flex gap-2 w-2/6 md:w-1/2">
            <div class="border border-lines w-25 h-25 rounded flex items-center justify-center hover:bg-blue">
                <a href="{{$setting->facebook}}" target='_blank'><i class="fab fa-facebook-f text-graytext hover:text-white text-sm"></i></a>
            </div>
            <div class="border border-lines w-25 h-25 rounded flex items-center justify-center hover:bg-blue">
                <a href="{{$setting->instagram}}" target='_blank'><i class="fab fa-instagram text-graytext hover:text-white text-sm"></i></a>
            </div>
            <div class="border border-lines w-25 h-25 rounded flex items-center justify-center hover:bg-red">
                <a href="{{$setting->youtube}}" target='_blank'><i class="fab fa-youtube text-graytext hover:text-white text-sm"></i></a>
            </div>
        </div>
        <div class="opctions w-4/6 md:w-1/2 flex justify-end gap-2 text-xs md:text-sm ">
            <div class="item border-r border-graytext pr-3 hidden"><a href="">ENG <i class="fas fa-caret-down"></i></a></div>
            <div class="uppercase pl-3">
                @if (isset(Auth::user()->name))
                    @if(Auth::user()->role == '1')
                    <span class="border-r border-graytext pr-3 text-white"><a href="/profile/dashboard">My Account</a></span>
                    @else
                    <span class="border-r border-graytext pr-3 text-white"><a href="/calendar-fields">Settings</a></span>
                    @endif
                    <span class="pl-2 text-graytext">
                        <form method="POST" action="/logout" class="inline-block">
                        @csrf
                        <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();" class="text-danger">Logout</a>
                        </form>
                    </span>
                @else
                    <a href="/signin">Sign In</a> / 
                    <a href="/signup" class="font-bold text-info">Sign Up</a>
                @endif
            </div>
        </div>
    </div>
</div>
