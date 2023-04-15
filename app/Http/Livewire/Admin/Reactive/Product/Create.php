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
        'addImage' => 'addImage',
        'receiveAttribute' => 'receiveAttribute',
        'refresh' => '$refresh'
    ];


    public function mount()
    {
        $this->productClone = Product::find(107);
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

        if ($this->attribute)
            $this->setAttributes($product);
    }

    public function addImage($image)
    {
        if (!is_null($image))
            $this->images[] = $image;
    }

    public function insertImages($product, array|object $images)
    {
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


    public function receiveAttribute($data)
    {
        // dd($data);
        if (!collect($this->attribute)->contains('name', $data['name']))
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
                'attributeID' => $names['name']->id,
                'attributeValueID' => $names['value']->id
            ];
        }



        if (!$attrId)
            return false;

        foreach ($attrId['attribute'] as $attribute) {
            $product->attribute()->attach($attribute['attributeID'], ['value_id' => $attribute['attributeValueID']]);
        }
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

}