<?php
namespace App\Services\Cart;

use App\Models\Product;

interface CartContract
{
    public function add(Product $product);

    public function update(Product $product);

    public function remove(Product $product);

    public function all();

    public function getById(Product $product);
}







?>