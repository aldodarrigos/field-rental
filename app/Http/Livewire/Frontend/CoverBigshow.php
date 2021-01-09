<?php

namespace App\Http\Livewire\Frontend;
use Livewire\Component;
use App\Models\Field;

class CoverBigshow extends Component
{
    public function render()
    {
        $all_fields = Field::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('livewire.frontend.cover-bigshow', ['all_fields' => $all_fields]);
    }
}
