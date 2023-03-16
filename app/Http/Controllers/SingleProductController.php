<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\RecentlyView\Facade\RecentlyView;

class SingleProductController extends Controller
{

    public function __invoke()
    {
        
    }
    public function getProduct(Product $product)
    {
        RecentlyView::add($product);
        return view('main.product.product-fullpage', compact('product'));
    }
}