<?php

namespace App\Http\Livewire\Admin\Reactive\Product;

use App\Models\Attribute;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductattributeValue;
use Livewire\Component;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class Create extends Component
{

    public $product;
    public $images;

    public $photo;

    public $description;

    public $attribute;

    protected $rules = [
        'product.title' => ['required', 'min:3', 'max:255'],
        'product.vendor_id' => ['required'],
        'product.price' => ['required'],
        'product.quantity' => ['required'],
        'description' => ['required'],
        'images' => [],
        'product.category' => ['required']
    ];

    protected $listeners = [
        'addImage',
        'receiveAttribute'
    ];


    public function mount()
    {
        $this->productClone=Product::find(107);
    }
    public function render()
    {
        return view('components.admin.reactive.product.create');
    }

    public function createProduct()
    {
        
        $data = $this->validate();

        $data['product']['description'] = $data['description'];

        $product = Product::create($data['product']);

        $product->Categories()->attach($data['product']['category']);


        $this->insertImages($product, $data['images']);

        if($this->attribute)
            $this->setAttributes($product);
    }

    public function addImage($image)
    {
        if (!is_null($image))
            $this->images[] = $image;
    }

    public function insertImages($product,array|object $images)
    {
        if (is_null($images))
            return false;

        $all = [];

        foreach($images as $image) {
            $all[] = [
                'url' => $image,
                'alt' => 'noasdasd'
            ];

        }

        foreach ($all as $img) {
            $product->images()->create($img);
        }
    }


    public function receiveAttribute($data)
    {
        $this->attribute[] = $data;
    }

    public function setAttributes(Product $product)
    {
        $attribute = [];

        if (is_null($this->attribute))
            return null;

        foreach ($this->attribute as $attr) {
            $attribute['instances'][] = [
                'name' =>
                $attrName = Attribute::firstOrCreate(['name' => $attr['name']]),
                'value' =>
                $attrName->attributeValue()->create(['value' => $attr['value']])
            ];
        }

        $attrId = [];

        foreach ($attribute['instances'] as $names) {
            $attrId['attribute'][] = [
                'attributeID'=>$names['name']->id,
                'attributeValueID'=>$names['value']->id
            ];
        }



        if(!$attrId)
            return false;

        foreach($attrId['attribute'] as $attribute)
        {
            $product->attribute()->attach($attribute['attributeID'],['value_id'=>$attribute['attributeValueID']]);
        }
    }

}