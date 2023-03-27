<?php
namespace App\Models\Traits;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Product as ModelsProduct;
use App\Models\ProductattributeValue;
use App\Models\Vendor;
use Psy\CodeCleaner\AssignThisVariablePass;

use function PHPUnit\Framework\returnSelf;

trait Product
{


      /**
     * Relation to Vendor Table
     * 
     * @return object this method return a vendor of products
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * morph relation with comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function Categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'=>'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function images()
    {
        return $this->morphMany(Image::class,'imagable');
    }

    public function attribute()
    {
        return $this->belongsToMany(Attribute::class,'attribute_product','product_id','attribute_id')
                    ->using(ProductattributeValue::class)
                    ->withPivot('value_id');
    }

    public function getProduct(ModelsProduct $product)
    {   
        return view('main.product.product-fullpage',compact('product'));
    }

    public function getProductVendor(string $filed=null)
    {
        if($this->vendor)
        {
            if($filed==null)
                return $this->vendor;
            else 
                return ($this->vendor->vendor_name) ? $this->vendor->$filed : "unknown";
        }
        else
        {
            return 'ناشناس';
        }
        
    }

    public function getAllComments()
    {
        return ($this->comments) ? $this->comments : '';
    }

    public function getComments(int $count=4)
    {
        return ($this->comments) ?  $this->comments()->paginate($count) : '';
    }


    public function getCategory()
    {
        return ($this->Categories) ? $this->Categories : '';
    }
}


?>