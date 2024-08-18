<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class MainNav extends Component
{
    public function render()
    {
        $links = Menu::where('status', 1)->where('parent_id', 0)->orderBy('sort', 'ASC')->get();
        return view('livewire.main-nav', ['links' => $links]);
    }
}
