<?php

namespace App\Http\Livewire\Admin\Reactive\Product;

use App\Models\Product;
use Livewire\Component;
use Psy\Readline\Hoa\Protocol;

class Update extends Component
{

    public Product $product;

    public $productEditable;
    public $images;

    public $photo;

    public $description;

    public $attribute;

    protected $rules = [
        'productEditable.title' => ['required', 'min:3', 'max:255'],
        'productEditable.vendor_id' => ['required'],
        'productEditable.price' => ['required'],
        'productEditable.quantity' => ['required'],
        'description' => ['required'],
        'images' => [],
        'productEditable.category' => ['required']
    ];

    protected $listeners = [
        'addImage' => 'addImage',
        'receiveAttribute' => 'receiveAttribute',
        'refresh' => '$refresh'
    ];


    public function mount()
    {
        if ($this->product) {
            $this->productEditable['title'] = $this->product->title;
            $this->productEditable['vendor_id'] = $this->product->vendor->id;
            $this->productEditable['price'] = $this->product->price;
            $this->productEditable['quantity'] = $this->product->quantity;

            $this->description = $this->product->description;

            $this->images = $this->images($this->product);

            $this->attribute=$this->setAttributes($this->product);
        }
    } 

    public function render()
    {
        return view('components.admin.reactive.product.update');
    }

    public function editProduct()
    {

        $data = $this->validate();

        $data['productEditable']['description'] = $data['description'];

        $product = $this->product->update($data['productEditable']);

        if(!$product)
            return false;

        $this->product->Categories()->detach();

        $this->product->Categories()->attach($data['productEditable']['category']);


        $this->insertImages($this->product, $data['images']);

        if ($this->attribute)
            $this->setAttributes($this->product);
    }

    public function setAttributes(Product $product)
    {
        foreach ($product->attribute as $attribute) {
            $this->attribute[] = [
                'name' => $attribute->name,
                'value' => $attribute->pivot->value->value
            ];
        }
    }

    public function receiveAttribute($data)
    {
        // dd($data);
        if (!collect($this->attribute)->contains('name', $data['name']))
            $this->attribute[] = $data;
    }

    public function images(Product $product)
    {
        $resault=[];
        foreach($product->images as $image)
        {
            $resault[]=str_replace('\/','/',$image->url);
        }

        return $resault;
    }

    public function removePicture($image)
    {
        $arrayNumber = array_search($image, $this->images);

        if (in_array($image, $this->images))
            unset($this->images[$arrayNumber]);

        $this->emit('refresh');
    }


    public function removeAttrubute($attr)
    {
        $arrayNumber = false;

        foreach ($this->attribute as $key => $attribute) {
            if ($attribute['name'] == $attr)
                $arrayNumber = $key;
        }

        if (is_numeric($arrayNumber) && $arrayNumber !== false)
            unset($this->attribute[$arrayNumber]);

        $this->emit('refresh');
    }


    public function insertImages($product, array|object $images)
    {
        $product->images()->where('imagable_id',$product->id)->delete();
        
        if (is_null($images))
            return false;

        $all = [];

        foreach ($images as $image) {
            $all[] = [
                'url' => $image,
                'alt' => 'noasdasd'
            ];

        }

        foreach ($all as $img) {
            $product->images()->create($img);
        }
    }
}