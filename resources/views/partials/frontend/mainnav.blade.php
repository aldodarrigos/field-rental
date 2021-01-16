<div class="bg-white fixed w-full z-30 top-10 shadow">
    <div class="w-full md:w-boxed mx-auto flex items-center h-70p md:h-90p px-4 sm:px-0 ">
        <div class="logo w-2/4 md:w-1/4">
            <a href="/" class="flex gap-1">
                <div class="logo"><img class="w-11" src="https://xava.pro/storage/offtopic/kisc-logo-200.webp" alt=""></div>
                <div class="font-roboto">
                    <div class="text-2x5 font-extrabold leading-none text-blue uppercase">Kisc</div>
                    <div class="subtitle text-red font-bold text-sm leading-none">Sports Complex</div>
                </div>
            </a>
        </div>
        <div class="w-2/4 md:w-3/4 flex gap-6 justify-end">
            <nav class="hidden md:block">
                <ul class="flex gap-4">
                    <livewire:main-nav></livewire:main-nav>
                </ul>
            </nav>
            <div class="hidden md:block">
                <x-frontend.buttons.link>
                    <x-slot name='link'>/fieldsrental</x-slot>
                    <x-slot name='size'>regular</x-slot>
                    Book now <i class="far fa-calendar-alt text-md pl-1"></i>
                </x-frontend.buttons.link>
            </div>
            <div class="block md:hidden">
                <span id='trigger_button' class="font-roboto bg-red font-semibold uppercase text-white text-xl px-2 py-1 mr-2 hover:bg-blue hover:text-white rounded ease-in-out duration-300"><i class="fas fa-bars"></i></span>
            </div>
        </div>
        
    </div>

    <div class="bg-gray nav_mobile border-t border-gray text-center hidden ease-in-out duration-500 transition py-4 shadow">
        <ul>
            <livewire:main-nav></livewire:main-nav>
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
