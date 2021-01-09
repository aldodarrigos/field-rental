<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Content;
use Livewire\Component;

class CoverSoccerAcademy extends Component
{
    public function render()
    {
        $content = Content::where('shortcut', 'cover.soccer.academy')->first();
        return view('livewire.frontend.cover-soccer-academy', ['content' => $content]);
    }
}
