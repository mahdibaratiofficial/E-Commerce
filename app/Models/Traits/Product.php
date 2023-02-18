<?php
namespace App\Models\Traits;

use App\Models\Product as ModelsProduct;
use App\Models\Vendor;

use function PHPUnit\Framework\returnSelf;

trait Product
{
    public function getProduct(ModelsProduct $product)
    {
        
        return view('main.product.product-fullpage',compact('product'));
    }

    public function getProductVendor(string $filed=null)
    {
        if($filed==null)
            return $this->vendor;
        else 
            return $this->vendor->$filed;
    }

    public function getAllComments()
    {
        return $this->comments;
    }

    public function getComments(int $count=4)
    {
        return $this->comments()->paginate($count);
    }


    public function getCategory()
    {
        return $this->categories;
    }
}


?>