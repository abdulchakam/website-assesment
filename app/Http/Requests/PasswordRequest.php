<?php

namespace App\Http\Requests;

use App\Rules\CurrentPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password'  => ['required','string', 'min:8', new CurrentPassword()],
            'password'          => ['required','min:8','confirmed'],
        ];
    }
}