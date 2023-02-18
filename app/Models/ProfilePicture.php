<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    use HasFactory;

    protected $fillable=[
        'url',
        'alt',
        'profilable_id',
        'profilable_type'
    ];

    public function profilable()
    {
        return $this->morphTo();
    }
}
