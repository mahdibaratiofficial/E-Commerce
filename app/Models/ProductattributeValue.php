<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductattributeValue extends Pivot
{
    public function value()
    {
        return $this->belongsTo(attributeValue::class,'value_id','id');
    }
}
