<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function getProduct(Product $product)
    {
    //    $product=$product->with('comments','images')->get();
       return view('main.product.product-fullpage',compact('product'));
    }
}
