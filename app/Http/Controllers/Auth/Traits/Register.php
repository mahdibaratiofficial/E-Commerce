<?php

namespace App\Http\Controllers\Auth\Traits;

use Illuminate\Http\Request;

trait Register
{
    public function validation(Request $request)
    {
        return $request->validate([
            'name'=>['string','max:255'],
            'username'=>['string','unique:users,username'],
            'email'=>['required','email'],
            'number'=>['required','max:11'],
            'password'=>['required','min:8','max:255'],
            'password_confirmation'=>['required','confirmed','min:8','max:255']
        ]);
    }
}



?>