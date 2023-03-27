<?php

namespace App\Models;

use App\Models\Traits\LikeTrait;
use App\Models\Traits\Product as TraitsProduct;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory, Sluggable, TraitsProduct, LikeTrait;

    protected $with = ['comments', 'images'];
    protected $fillable = [
        'title',
        'description',
        'rate',
        'vendor_id',
        'price',
        'quantity',
        'slug'
    ];

    protected $table = 'products';

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'product_id', 'id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}