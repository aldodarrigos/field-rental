<div class="bg-white fixed w-full z-30 top-10 shadow">
    <div class="w-full md:w-boxed mx-auto flex items-center h-70p md:h-90p px-4 sm:px-0 ">
        <div class="logo w-2/4 md:w-1/4">
            <a href="/" class="flex gap-1">
                <div class="logo"><img class="w-11" src="https://secureservercdn.net/198.71.233.96/4m9.9fa.myftpupload.com/wp-content/uploads/2020/12/cropped-Logo-KISC-Soccer.png" alt=""></div>
                <div class="font-roboto">
                    <div class="text-2x5 font-extrabold leading-none text-blue uppercase">Kisc</div>
                    <div class="subtitle text-red font-bold text-sm leading-none">Sport Complex</div>
                </div>
            </a>
        </div>
        <div class="w-2/4 md:w-3/4 flex gap-6 justify-end">
            <livewire:main-nav></livewire:main-nav>
            <div class="hidden md:block">
                <x-frontend.buttons.calltoaction link='/fieldsrental' size='regular'>Book now <i class="far fa-calendar-alt text-md pl-1"></i></x-frontend.buttons.calltoaction>
            </div>
            <div class="block md:hidden">
                <span id='trigger_button' class="font-roboto bg-red font-semibold uppercase text-white text-xl px-2 py-1 mr-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300"><i class="fas fa-bars"></i></span>
            </div>
        </div>
        
    </div>

    <div class="bg-gray nav_mobile border-t border-gray text-center hidden ease-in-out duration-500 transition py-4 shadow">
        <ul>
            <x-frontend.buttons.navlink link='/'>Home</x-frontend.buttons.navlink>
            <x-frontend.buttons.navlink link='/about'>About</x-frontend.buttons.navlink>
            <x-frontend.buttons.navlink link='/covid-19-protocol'>Covid Protocol</x-frontend.buttons.navlink>
            <x-frontend.buttons.navlink link='/services'>Services</x-frontend.buttons.navlink>
            <x-frontend.buttons.navlink link='/fields'>Fields</x-frontend.buttons.navlink>
            <x-frontend.buttons.navlink link='/news'>News</x-frontend.buttons.navlink>
            <x-frontend.buttons.navlink link='/contact'>Contact</x-frontend.buttons.navlink>
        </ul>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

    let nav = document.querySelector('.nav_mobile');
    let btn = document.getElementById('trigger_button')

    btn.addEventListener('click', function () {
        nav.classList.toggle('hidden');
    });

    });
</script>
