<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = "attributes";

    public $timestamps=false;


    public function attributeValue()
    {
        return $this->hasMany(attributeValue::class);
    }

}