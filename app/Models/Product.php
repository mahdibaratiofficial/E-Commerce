<?php

namespace App\Models;

use App\Models\Traits\Product as TraitsProduct;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable , TraitsProduct;

    protected $fillable = [
        'title',
        'descriotion',
        'rate',
        'vendor_id',
        'price',
        'quantity',
        'slug'
    ];

    protected $table = 'products';
}