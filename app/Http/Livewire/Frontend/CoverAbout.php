<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Content;
use Livewire\Component;

class CoverAbout extends Component
{
    public function render()
    {
        $content = Content::where('shortcut', 'cover.about')->first();
        return view('livewire.frontend.cover-about', ['content' => $content]);
    }
}
