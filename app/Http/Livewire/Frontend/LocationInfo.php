<?php

namespace App\Http\Livewire\Frontend;
use App\Models\{Setting};
use Livewire\Component;

class LocationInfo extends Component
{
    public function render()
    {
        $setting = Setting::first();
        return view('livewire.frontend.location-info', ['setting' => $setting]);
    }
}
