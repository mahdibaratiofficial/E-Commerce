<?php

namespace App\View\Components\main\unReactive;

use Illuminate\View\Component;

class Products3RowsTab extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main.un-reactive.products3-rows-tab');
    }
}
