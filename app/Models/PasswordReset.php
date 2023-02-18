<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['email', 'token','expire_at'];

    protected $table = 'password_resets';

    protected $primaryKey="token";

}
