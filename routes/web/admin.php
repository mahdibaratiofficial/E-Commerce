<?php

use App\Http\Controllers\OpenProductManagmentsPageController;
use App\Http\Livewire\Admin\Reactive\Product\All;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth'])->group(function ()
{
    Route::view('/', 'admin.index');

    // Product operations
    Route::prefix('product')->group(function(){
        Route::get('create', [OpenProductManagmentsPageController::class,'createProductPage']); 
        Route::get('edit/{product}', [OpenProductManagmentsPageController::class,'editProductPage']); 
        Route::get('all',All::class);
    });
});

?>