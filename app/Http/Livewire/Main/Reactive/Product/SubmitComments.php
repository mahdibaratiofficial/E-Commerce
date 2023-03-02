<?php

namespace App\Http\Livewire\Main\Reactive\Product;

use App\Models\Comment;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubmitComments extends Component
{
    public $body;

    public $product;

    public $parent;
    protected $rules = [
        'body' => ['required', 'min:3', 'max:255'],
        'product' => ['required'],
        'parent'=>['required']
    ];
    public function mount()
    {
        if (!Auth::user())
            return back();
    }
    public function render()
    {
        return view('components.main.reactive.product.submit-comments');
    }

    public function submitComment()
    {
        $data = $this->validate();

        $product = unserialize($data['product']);

        // need refactoring


        Auth::user()->comments()->create(
            [
                'body' => $data['body'],
                'commentable_id' => $product->id,
                'commentable_type' => get_class($product),
                'parent'=>$this->parent
            ]
        );
    }
}