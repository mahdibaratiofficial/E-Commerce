<?php

namespace App\Http\Livewire\Main\Reactive\Cart;

use App\Services\Cart\Cart as ProductCart;
use Cviebrock\EloquentSluggable\Tests\Models\PostWithUniqueSlugConstraints;
use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        return view('components.main.reactive.cart.cart',['carts'=>$this->allCarts()]);
    }

    public function allCarts()
    {
        return ProductCart::all();
    }

    public function remove($key)
    {
        return ProductCart::remove($key);
    }

    public function update()
    {
    }

   
}
