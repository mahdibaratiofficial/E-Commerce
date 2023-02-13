<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'descriotion',
        'rate',
        'vendor_id',
        'price',
        'quantity'
    ];

    protected $table='products';

    /**
     * Relation to Vendor Table
     * 
     * @return object this method return a vendor of products
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    

}
