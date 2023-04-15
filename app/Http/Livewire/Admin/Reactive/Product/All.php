<?php

namespace App\Http\Livewire\Admin\Reactive\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\Exceptions\NonPublicComponentMethodCall;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners=['refresh'=>'$refresh'];

    public $readyToLoad = false;
    public function loadProducts()
    {
        $this->readyToLoad = true;
    }
    public function render()
    {
        return view('components.admin.reactive.product.all', ['products' => $this->readyToLoad ? Product::paginate(10) : Product::paginate(0) ])->extends('layouts.admin.app')->section('content');
    }

    public function delete($productID)
    {
        $product=Product::find($productID)->delete();

        $this->emitSelf('refresh');
    }
}