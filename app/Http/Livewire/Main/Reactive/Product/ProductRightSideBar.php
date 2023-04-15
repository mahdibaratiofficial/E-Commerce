<?php

namespace App\Http\Livewire\Main\Reactive\Product;

use App\Models\Category;
use App\Models\Product;
use App\Services\Cart\Cart;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ProductRightSideBar extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $readyToLoad = false;
    public $category;

    public $minPrice;

    public $maxPrice;

    public $count = null;

    public $sort;

    protected $listeners = ['refreshProducts' => '$refresh'];

    protected $queryString = [
        'category' => ['except' => ''],
        'minPrice' => ['except' => ''],
        'maxPrice' => ['except' => ''],
        'count' => ['except' => ''],
        'sort' => ['except' => '']
    ];
    public function loadProducts()
    {
        $this->readyToLoad = true;
    }


    public function render()
    {
        return view(
            'components.main.reactive.product.product-right-side-bar',
            [
                'products' => $this->readyToLoad ? $this->showProducts() : Product::paginate(0),
                'category' => $this->readyToLoad ? $this->getCategories() : [],
            ]
        )->extends('layouts.main.app')->section('content');
    }

    public function paginationView()
    {
        return 'vendor\livewire\custome-products';
    }


    public function showProducts()
    {
        $product = Product::query();

        if ($this->category) {
            $product = $product->with('Categories')->whereHas('Categories', function (Builder $query)
            {
                $query->where('title', $this->category);
            });
        }


        // min and max pirce filter
        if ($this->minPrice && $this->maxPrice) {
            $product = $product->whereBetween('price', [$this->minPrice, $this->maxPrice]);
        }
        elseif ($this->maxPrice) {
            $product = $product->where('price', '<=', $this->minPrice);
        }
        elseif ($this->minPrice) {
            $product = $product->where('price', '>=', $this->minPrice);
        }


        if ($this->sort) {
            switch ($this->sort) {
                case 'LTH':
                    $product = $product->orderBy('price', 'asc');
                    break;

                case 'HTL':
                    $product = $product->orderBy('price', 'desc');
                    break;

                case 'dateNew':
                    $product = $product->orderBy('updated_at', 'desc');
                    break;

                case 'dateOld':
                    $product = $product->orderBy('updated_at', 'asc');
                    break;
            }
        }



        return $product->paginate($this->count ?? 15);


    }

    public function getCategories()
    {
        return Category::where('parent', 0)->take(5)->get();
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        Cart::add($product);

        $this->emitSelf('refreshProducts');
    }

    public function remove($key)
    {
        Cart::remove($key);

        $this->emitSelf('refreshProducts');
    }
}