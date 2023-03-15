<?php

namespace App\Http\Livewire\Main\Reactive\General;

use App\Models\Like;
use Livewire\Component;

class SingleRowOfLike extends Component
{
    public Like $like;
    public function render()
    {
        return view('components.main.reactive.general.single-row-of-like');
    }

    public function unlike()
    {
        dd($this->like);
    }
}
