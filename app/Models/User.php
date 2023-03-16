<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'number',
        'birth_day',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation One to many with user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany 
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Relation To Active Code
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany 
     */
    public function activeCode(): HasMany
    {
        return $this->hasMany(ActiveCode::class);
    }


    public function getRouteKeyName()
    {
        return 'username';
    }


    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'user_vendor');
    }

    public function profilePicture()
    {
        return $this->morphOne(ProfilePicture::class, 'profilable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function userProductLikes()
    {
        $user = $this->likes()->where('likeable_type', 'App\Models\Product')->get();

        return $user ?? null;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAllow($permission)
    {
        return $this->permissions->contains('name',$permission) ?? $this->hasRole($permission);
    }

    public function hasRole($permission=null)
    {
        foreach($this->roles as $role)
        {
            if($role->permissions->contains('name',$permission))
                return true;
        }
    }
}