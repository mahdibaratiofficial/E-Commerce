<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OpenProductManagmentsPageController extends Controller
{
    public function createProductPage()
    {
        return view('admin.product.create');
    }

    public function editProductPage(Product $product)
    {
        return view('admin.product.update',compact('product'));
    }
}
