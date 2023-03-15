<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'views',
        'user_id',
        'time_to_read'
    ];

    protected $table='posts';

    /**
     * Relation One to Many with user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * morph relation with comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imagable');
    }


    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
    
}
