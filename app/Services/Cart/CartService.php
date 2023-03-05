<?php
namespace App\Services\Cart;

use App\Models\Product;
use App\Services\Cart\CartContract;

class CartService
{

    protected $instance;
    public function __construct($instance)
    {
        try {
            $this->instance = new $instance();
        }
        catch (\Exception $e) {
            $this->instance=new CookieCart();
        }
    }

    public function add(Product $product,$quantity=1)
    {
        $this->instance->add($product,$quantity);
    }


    public function update(mixed $id,$quantity)
    {
        return $this->instance->update($id,$quantity);
    }

    public function remove(mixed $product)
    {
        // dd($this->instance);
        return $this->instance->remove($product);
    }

    public function all()
    {
        return $this->instance->all();
    }

    public function getById(int|string $id)
    {
        return $this->instance->getById($id);
    }

    public function has(mixed $id)
    {
        return $this->instance->has($id);
    }

    public function quantity($id)
    {
        return $this->instance->quantity($id);
    }
}

?>