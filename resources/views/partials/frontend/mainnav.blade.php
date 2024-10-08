<div class="bg-white fixed w-full z-30 top-10 shadow">
    <div class="w-full md:w-boxed mx-auto flex items-center h-70p md:h-90p px-2 sm:px-0 ">
        <div class="logo w-2/5 md:w-1/4">
            <a href="/" class="flex gap-1">
                <div class="logo"><img class="w-24 sm:w-32" src="{{\App\Models\Setting::first()->logo}}" alt=""></div>
            </a>
        </div>
        <div class="w-3/5 md:w-3/4 flex gap-2 justify-end">
            <nav class="hidden md:block">
                <ul class="flex gap-4">
                    <livewire:main-nav></livewire:main-nav>
                </ul>
            </nav>
            <div class="hidden md:block">
                <x-frontend.buttons.link>
                    <x-slot name='link'>/fieldsrental</x-slot>
                    <x-slot name='size'>regular</x-slot>
                    Rent now <i class="far fa-calendar-alt text-md pl-1"></i>
                </x-frontend.buttons.link>
            </div>
            <div class="block md:hidden flex gap-2">
                <a href="/fieldsrental" class="bg-red font-roboto text-gray font-bold rounded py-2 px-4 uppercase text-sm hover:bg-deepblue ease-in-out duration-300">Rent now <i class="far fa-calendar-alt text-md pl-1"></i></a>

                <span id='trigger_button' class="font-roboto bg-red font-semibold uppercase text-white text-xl px-4 py-1 hover:bg-blue hover:text-white rounded ease-in-out duration-300"><i class="fas fa-bars"></i></span>
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
