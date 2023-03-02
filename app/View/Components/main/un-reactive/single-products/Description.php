<?php

namespace App\View\Components\main\un-reactive\single-product;

use App\View\Components\main\unReactive\Helper;
use Illuminate\View\Component;

class Description extends Component
{
    use Helper;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $description ;
    public function __construct($description)
    {
        $this->description=$description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main.un-reactive.single-product.description');
    }
}
