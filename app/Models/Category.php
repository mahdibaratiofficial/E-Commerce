<?php

namespace App\Models;

use App\Models\Traits\Category as TraitsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,TraitsCategory;

    protected $fillable=[
        'title',
        'parent',
        'description'
    ];

    public function Products()
    {
        return $this->belongsToMany(Product::class);
    }
}
