<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable=[
        'vendor_name',
        'rate',
        'presentation',
        'address',
        'phone',
        'email',
        'socials',
    ];

    /**
     * Relation to Product
     *
     * @return object 
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
