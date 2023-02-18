<?php

namespace App\Models;

use App\Models\Traits\Product as TraitsProduct;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable , TraitsProduct   ;

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
                'source'=>'slug'
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
}