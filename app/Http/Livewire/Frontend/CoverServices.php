<?php

namespace App\Http\Livewire\Frontend;
use App\Models\{Content, Service};
use Livewire\Component;

class CoverServices extends Component
{
    public function render()
    {
        $content = Content::where('shortcut', 'cover.services')->first();
        $services = Service::where([
            ['status', 1],
            ['flag', 1]])->orderBy('sort', 'ASC')->get();
        return view('livewire.frontend.cover-services', ['content' => $content, 'services' => $services]);
    }
}
