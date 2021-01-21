<?php

namespace App\Http\Livewire\Frontend;
use Livewire\Component;
use App\Models\{Field, Slide};

class CoverBigshow extends Component
{
    public function render()
    {
        $all_fields = Field::where('status', 1)->orderBy('number', 'ASC')->get();
        $slides = Slide::where('status', 1)->orderBy('sort', 'ASC')->get();
        return view('livewire.frontend.cover-bigshow', ['all_fields' => $all_fields, 'slides' => $slides]);
    }
}
