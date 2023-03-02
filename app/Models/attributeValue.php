<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Commands\PublishCommand;

class attributeValue extends Model
{
    use HasFactory;

    protected $table='attribute_value';

    protected $fillable=[
        'attribute_id',
        'value'
    ];

    public $timestamps=false;

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
