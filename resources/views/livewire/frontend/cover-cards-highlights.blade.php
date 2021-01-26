<div class="">
    <div class="w-11/12 md:w-boxed mx-auto">
        <div class="flex gap-8 flex-col md:flex-row">
            @foreach ($content as $content)

                <div class="w-3/3 md:w-1/3 bg-blue rounded-lg">
                    <x-frontend.cards.cover_highlight>
                        <x-slot name='subtitle'>{{$content->subtitle}}</x-slot>
                        <x-slot name='title'>{{$content->title}}</x-slot>
                        <x-slot name='title_color'>white</x-slot>
                        <x-slot name='sumary'>
                            {{$content->content}}
                        </x-slot>
                        <x-slot name='sumary_color'>gray</x-slot>
                        <x-slot name='image'>{{$content->img}}</x-slot>
                        <x-slot name='bg'>blue</x-slot>
                        <x-slot name='link'>{{$content->link}}</x-slot>
                        <x-slot name='link_text'>Read more <i class="fas fa-plus text-xs"></i></x-slot>
                        <x-slot name='tag'>{{$content->subtitle}}</x-slot>
                    </x-frontend.cards.cover_highlight>
                </div>
                
            @endforeach

        </div>
    </div>
</div>
