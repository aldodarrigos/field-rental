<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Content;
use Livewire\Component;

class CoverCardsHighlights extends Component
{
    public function render()
    {
        $content = Content::where('shortcut', 'like', 'cards.highlight%')->orderBy('shortcut', 'ASC')->get();
        return view('livewire.frontend.cover-cards-highlights', ['content' => $content]);
    }
}
