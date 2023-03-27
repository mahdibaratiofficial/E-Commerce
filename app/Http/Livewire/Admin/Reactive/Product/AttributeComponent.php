<?php

namespace App\Http\Livewire\Admin\Reactive\Product;

use Livewire\Component;
use Livewire\Exceptions\NonPublicComponentMethodCall;

class AttributeComponent extends Component
{

    public function render()
    {
        return view('components.admin.reactive.product.attribute-component');
    }


    public function submit($data)
    {
        $this->emit('receiveAttribute',$data);
    }
}
