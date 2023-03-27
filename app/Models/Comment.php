<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body',
        'commentable_id',
        'commentable_type',
        'like',
        'dislike',
        'parent'
    ];


    public function commentable()
    {
        return $this->morphTo();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function childs()
    {
        return $this->hasMany(Comment::class, 'parent', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent', 'id');
    }


    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}