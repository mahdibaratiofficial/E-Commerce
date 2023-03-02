<?php

namespace App\View\Components\main\un-reactive\single-product;

use App\Models\Product;
use Illuminate\View\Component;

class AdditionalInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $attributes;
    public function __construct($attributes)
    {
        $this->attributes=$this->safeLoad($attributes,'attribute');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(!is_null($this->attributes))
            return view('components.main.un-reactive.single-product.additional-info');
        else
            return '';
    }


    public function safeLoad(Product $product,$methodName)
    {
        if($product->$methodName())
            return $product->attribute;
        else
            return null;
    }
}
