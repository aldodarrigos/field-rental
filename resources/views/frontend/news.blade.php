@extends('layouts.frontend')

@section('content')

@section('assets_down')

    @parent
    

@endsection

<x-frontend.pieces.section_header title='News' bread='latest News'></x-frontend.pieces.section_header>

<div class="w-11/12 md:w-boxed mx-auto">

    <div class="grid grid-cols-12 gap-4 py-8">

        <main class="col-span-12 md:col-span-8">
            
            <x-frontend.cards.post_flat>
                <x-slot name='image'>http://fc-united.axiomthemes.com/wp-content/uploads/2018/11/post-6-copyright-600x394.jpg</x-slot>
                <x-slot name='title'>Effective Training Programs for Professional Players in MLS</x-slot>
                <x-slot name='link'>/post/url</x-slot>
                <x-slot name='date'>December 12, 2020</x-slot>
                <x-slot name='sumary'>Training equipment is important for professional football training and sometimes it can be used for athletes  training as well…
                </x-slot>
                <x-slot name='bg'>white</x-slot>
                <x-slot name='tag'>Courses</x-slot>
                <x-slot name='tag_link'>/</x-slot>
            </x-frontend.cards.post_flat>
            
            <x-frontend.cards.post_flat>
                <x-slot name='image'>http://fc-united.axiomthemes.com/wp-content/uploads/2018/11/post-6-copyright-600x394.jpg</x-slot>
                <x-slot name='title'>Effective Training Programs for Professional Players in MLS</x-slot>
                <x-slot name='link'>/post/url</x-slot>
                <x-slot name='date'>December 12, 2020</x-slot>
                <x-slot name='sumary'>Training equipment is important for professional football training and sometimes it can be used for athletes  training as well…
                </x-slot>
                <x-slot name='bg'>white</x-slot>
                <x-slot name='tag'>Courses</x-slot>
                <x-slot name='tag_link'>/</x-slot>
            </x-frontend.cards.post_flat>
            
            <x-frontend.cards.post_flat>
                <x-slot name='image'>http://fc-united.axiomthemes.com/wp-content/uploads/2018/11/post-6-copyright-600x394.jpg</x-slot>
                <x-slot name='title'>Effective Training Programs for Professional Players in MLS</x-slot>
                <x-slot name='link'>/post/url</x-slot>
                <x-slot name='date'>December 12, 2020</x-slot>
                <x-slot name='sumary'>Training equipment is important for professional football training and sometimes it can be used for athletes  training as well…
                </x-slot>
                <x-slot name='bg'>white</x-slot>
                <x-slot name='tag'>Courses</x-slot>
                <x-slot name='tag_link'>/</x-slot>
            </x-frontend.cards.post_flat>
            
            <x-frontend.cards.post_flat>
                <x-slot name='image'>http://fc-united.axiomthemes.com/wp-content/uploads/2018/11/post-6-copyright-600x394.jpg</x-slot>
                <x-slot name='title'>Effective Training Programs for Professional Players in MLS</x-slot>
                <x-slot name='link'>/post/url</x-slot>
                <x-slot name='date'>December 12, 2020</x-slot>
                <x-slot name='sumary'>Training equipment is important for professional football training and sometimes it can be used for athletes  training as well…
                </x-slot>
                <x-slot name='bg'>white</x-slot>
                <x-slot name='tag'>Courses</x-slot>
                <x-slot name='tag_link'>/</x-slot>
            </x-frontend.cards.post_flat>
            
            <x-frontend.cards.post_flat>
                <x-slot name='image'>http://fc-united.axiomthemes.com/wp-content/uploads/2018/11/post-6-copyright-600x394.jpg</x-slot>
                <x-slot name='title'>Effective Training Programs for Professional Players in MLS</x-slot>
                <x-slot name='link'>/post/url</x-slot>
                <x-slot name='date'>December 12, 2020</x-slot>
                <x-slot name='sumary'>Training equipment is important for professional football training and sometimes it can be used for athletes  training as well…
                </x-slot>
                <x-slot name='bg'>white</x-slot>
                <x-slot name='tag'>Courses</x-slot>
                <x-slot name='tag_link'>/</x-slot>
            </x-frontend.cards.post_flat>

        </main>
        
        <aside class="col-span-12 md:col-span-4">

            <livewire:frontend.aside-ad></livewire:frontend.aside-ad>
            <livewire:frontend.aside-tournament></livewire:frontend.aside-tournament>
            <livewire:frontend.aside-nextmatch></livewire:frontend.aside-nextmatch>

        </aside>
    </div>
    
</div>

@endsection


