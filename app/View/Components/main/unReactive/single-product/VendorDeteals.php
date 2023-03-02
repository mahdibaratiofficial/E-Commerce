<?php

namespace App\View\Components\main\unReactive;
use Illuminate\View\Component;

class VendorDeteals extends Component
{
    use Helper;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $product;
    public function __construct($product)
    {
        $this->product=$this->safeLoad($product,'vendor');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(is_null($this->product))
            return view('components.main.un-reactive.single-product.vendor--deteals');
    }
}
