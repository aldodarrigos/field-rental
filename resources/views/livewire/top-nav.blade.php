<div class="bg-deepblue text-graytext fixed w-full z-30">
    <div class="w-full md:w-boxed max-w-boxed mx-auto h-40 flex items-center px-4 sm:px-0">
        <div class="social flex gap-2 w-2/5 md:w-1/2">
            <div class="border border-lines w-25 h-25 rounded flex items-center justify-center hover:bg-blue">
                <a href="" target='_blank'><i class="fab fa-facebook-f text-graytext hover:text-white text-sm"></i></a>
            </div>
            <div class="border border-lines w-25 h-25 rounded flex items-center justify-center hover:bg-blue">
                <a href="https://www.instagram.com/katyinternationalsportscomplex" target='_blank'><i class="fab fa-instagram text-graytext hover:text-white text-sm"></i></a>
            </div>
            <div class="border border-lines w-25 h-25 rounded flex items-center justify-center hover:bg-red">
                <a href="https://www.youtube.com/channel/UC8bNjd1mAXPUvZa3cuL94BA" target='_blank'><i class="fab fa-youtube text-graytext hover:text-white text-sm"></i></a>
            </div>
        </div>
        <div class="opctions w-3/5 md:w-1/2 flex justify-end gap-2 text-sm ">
            <div class="item border-r border-graytext pr-3 hidden"><a href="">ENG <i class="fas fa-caret-down"></i></a></div>
            <div class="uppercase pl-3">
                @if (isset(Auth::user()->name))
                    <span class="border-r border-graytext pr-3 text-white"><a href="/profile/dashboard">{{Auth::user()->name}}</a></span>

                    <span class="pl-2 text-graytext">
                        <form method="POST" action="/logout" class="inline-block">
                        @csrf
                        <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </span>
                @else
                    <a href="/user-login">Login</a>
                @endif
            </div>
        </div>
    </div>
</div>
