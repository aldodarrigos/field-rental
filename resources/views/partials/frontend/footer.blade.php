<footer class="bg-blue text-white">
    <div class="w-full md:w-boxed mx-auto flex items-center h-90 px-4 md:px-0">
        <div class="logo w-2/4 md:w-1/4">
            <a href="/" class="flex gap-1">
                <div class="logo"><img class="w-24 sm:w-32" src="{{\App\Models\Setting::first()->logo_white}}" alt=""></div>
            </a>
        </div>
        <div class="w-2/4 md:w-3/4 flex gap-6 justify-end">
            {{-- <nav class="hidden md:block">
                <ul class="flex gap-4">
                    <livewire:main-nav></livewire:main-nav>
                </ul>
            </nav> --}}
            <div class="calltoaction">
                <x-frontend.buttons.link>
                    <x-slot name='link'>/fieldsrental</x-slot>
                    <x-slot name='size'>regular</x-slot>
                    Rent now <i class="far fa-calendar-alt text-md pl-1"></i>
                </x-frontend.buttons.link>
            </div>
        </div>
        
    </div>
</footer>