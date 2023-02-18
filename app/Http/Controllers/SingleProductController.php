<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function getProduct(Product $product)
    {
       return $product->getProduct($product);
    }
}
