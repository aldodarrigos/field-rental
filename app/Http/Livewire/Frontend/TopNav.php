<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Setting;
use Livewire\Component;

class TopNav extends Component
{
    public function render()
    {
        $setting = Setting::first();
        return view('livewire.frontend.top-nav', ['setting' => $setting]);
    }
}
