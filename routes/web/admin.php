<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth'])->group(function ()
{
    Route::view('/', 'admin.index');

    // Product operations
    Route::prefix('product')->group(function(){
        Route::view('create', 'admin.product.create'); 
        Route::view('all','admin.product.all',['products'=>App\Models\Product::paginate(20)]);
    });
});

?>