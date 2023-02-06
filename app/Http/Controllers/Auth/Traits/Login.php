<?php
namespace App\Http\Controllers\Auth\Traits;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait Login
{
    private function validation(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'password' => ['required', 'min:6', 'max:255']
        ]);
    }

    private function findUser($data)
    {
        return User::where('email', $data)->orWhere('username', $data)->orWhere('number', $data)->first();
    }


    private function check(array $data)
    {
        $user=$this->findUser($data['name']);

        return Hash::check($data['password'], $user->password) ? $user : false;
    }


    /**
    * Remember Token Generation
    *
    * @return void
    */
    public function rememberMe()
    {
        // develop later
    }
}



?>