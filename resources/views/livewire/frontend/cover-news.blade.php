<div class="bg-gray">

    <div class="w-11/12 md:w-boxed mx-auto">

        <div class="mb-12 grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-12">
        
            @foreach ($posts as $post)
                <x-frontend.cards.post>
                    <x-slot name='image'>{{$post->img}}</x-slot>
                    <x-slot name='title'>{{$post->title}}</x-slot>
                    <x-slot name='link'>/post/{{$post->slug}}</x-slot>
                    <x-slot name='date'>{{$post->pub_date}}</x-slot>
                    <x-slot name='sumary'>{{$post->sumary}}
                    </x-slot>
                    <x-slot name='bg'>blue</x-slot>
                    <x-slot name='tag'>{{$post->tag_name}}</x-slot>
                    <x-slot name='tag_link'>/tags/{{$post->tag_slug}}</x-slot>
                </x-frontend.cards.post>
            @endforeach
    
        </div>
    
        <div class="text-center">
            <x-frontend.buttons.link>
                <x-slot name='link'>/news</x-slot>
                <x-slot name='size'>regular</x-slot>
                More news <i class="fas fa-plus text-xs"></i>
            </x-frontend.buttons.link>
        </div>
    </div>
    
</div>