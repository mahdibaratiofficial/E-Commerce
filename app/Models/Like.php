<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Commands\PublishCommand;

class Like extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'likeable_id',
        'likeable_type'
    ];

    public $timestamps=false;

    public function likeable()
    {
        return $this->morphTo('product');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
