<?php

namespace App\Http\Livewire\Main\Reactive\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileInformation extends Component
{
    public User $user;
 


    public function render()
    {
        return view('components.main.reactive.profile.profile-information');
    }

    public function update()
    {
        $data = $this->validate();

        $user = Auth::user();

        $user->update($data['user']);
    }

    public function rules()
    {
        return [
            'user.name'=>['max:255'],
            'user.username'=>['required','min:3','max:255',Rule::unique('users','username')->ignore(Auth::id())],
            'user.email'=>['required','min:3','max:255',Rule::unique('users','email')->ignore(Auth::id())],
            'user.number'=>['required','min:3','max:255',Rule::unique('users','number')->ignore(Auth::id())],
            'user.birth_day'=>[]
        ];
    }
}