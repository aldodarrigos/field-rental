<?php

namespace App\View\Components\Frontend\buttons;

use Illuminate\View\Component;

class calltoaction extends Component
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
        return view('components.frontend.buttons.calltoaction');
    }
}
