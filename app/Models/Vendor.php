<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_name',
        'rate',
        'presentation',
        'address',
        'phone',
        'email',
        'socials',
    ];


    protected $table = "vendors";

    /**
     * Relation to Product
     *
     * @return object 
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Who User Fallow This Vendor?
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_vendor');
    }

    public function profile()
    {
        return $this->morphOne(ProfilePicture::class, 'profilable');
    }
}