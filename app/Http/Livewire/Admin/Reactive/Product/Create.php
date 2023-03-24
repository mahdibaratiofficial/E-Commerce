<?php

namespace App\Http\Livewire\Admin\Reactive\Product;

use Livewire\Component;

class Create extends Component
{

    public $product;

    protected $rules=[
        'product.title'=>['required','min:3','max:255'],
        'product.vendor'=>[''],
        'product.price'=>['required'],
        'product.quantity'=>['required'],
        'description'=>['required']
    ];

    public $description;

    public function render()
    {
        return view('components.admin.reactive.product.create');
    }

    public function createProduct()
    {
        dd($this->validate());
    }
}
