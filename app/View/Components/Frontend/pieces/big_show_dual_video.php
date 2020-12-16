<?php

namespace App\View\Components\frontend\pieces;

use Illuminate\View\Component;

class big_show_dual_video extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.frontend.pieces.big_show_dual_video');
    }
}
