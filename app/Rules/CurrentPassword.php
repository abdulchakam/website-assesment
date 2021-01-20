<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CurrentPassword implements Rule
{


    public function passes($attribute, $value)
    {
        return Hash::check($value, Auth::user()->password);
    }


    public function message()
    {
        return 'Password yang anda masukan tidak sesuai!';
    }
}
