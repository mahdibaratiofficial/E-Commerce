<?php

namespace App\View\Components\main\un-reactive\single-product;

use App\View\Components\main\unReactive\Helper;
use Illuminate\View\Component;

class Comments extends Component
{
    use Helper;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $comments;
    public function __construct($comments)
    {
        $this->comments=$this->safeLoad($comments,'comments');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main.un-reactive.single-product.comments');
    }
}
