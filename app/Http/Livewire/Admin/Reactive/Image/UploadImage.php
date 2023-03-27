<?php

namespace App\Http\Livewire\Admin\Reactive\Image;

use Livewire\Component;

class UploadImage extends Component
{
    public $photo;

    protected $rules=[
        'photo'=>['required','min:33']
    ];
    public function render()
    {
        return view('components.admin.reactive.image.upload-image');
    }

    public function updated()
    {
        dd($this->photo);
    }

    public function submit($data)
    {
        $this->photo=$data;

        $this->emit('addImage',$this->photo['image'] ?? null);
    }
}
