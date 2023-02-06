<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Loader\ProtectedPhpFileLoader;

class ActiveCode extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'ip_address',
        'code',
        'expire_at'
    ];


    public $timestamps = false;


    /**
     * Relation To User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
