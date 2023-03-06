<?php

namespace App\Http\Livewire\Main\Reactive\Product;

use App\Models\Product;
use App\Services\Cart\Cart;
use Livewire\Component;

class Actions extends Component
{

    public $product;

    public function boot()
    {

    }

    public function render()
    {
        return view('components.main.reactive.product.actions');
    }

    public function addToWishList()
    {
        return 'wish list';
    }

    public function like()
    {
        return 'like';
    }

    public function addToCart(Product|array $product)
    {
        if (is_array($product))
            $product = Product::find($product['id']);

        if (!Cart::add($product))
            return $this->addError('inventory', 'اتمام موجودی');
        
        $this->has($product['id']);
    }

    public function remove($key)
    {
        Cart::remove($key);

        $this->has($key);
    }

    public function plus($id, $productQuantity)
    {
        // dd($id);
        $cart = Cart::getById($id);

        // dd($cart[md5($id)]['quantity'] );
        if ($cart[md5($id)]['quantity'] < 5) {

            if ($productQuantity < $cart[md5($id)]['quantity']) {
                $this->addError('productQuantity', 'موجودی محصولات از سفارش درخواستی شما کمتر است.');
            }

            Cart::update($id, $cart[md5($id)]['quantity'] + 1);

        }
        else {
            return $this->addError('quantity', 'حد مجاز برای سفارش 5 عدد است');
        }

        $this->has($id);
    }

    public function minus($id)
    {
        $cart = Cart::getById($id);

        if (($cart[md5($id)]['quantity'] - 1) < 1)
            $this->remove($cart['id']);

        Cart::update($id, $cart[md5($id)]['quantity'] - 1);

        $this->has($id);
    }

    public function has($id)
    {
        return Cart::has($id);
    }
}