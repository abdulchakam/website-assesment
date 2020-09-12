<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                   => 'required|min:3|max:80',
            'username'               => 'required|min:2|max:20|unique:users,username',
            'email'                  => 'required|email',
            'role'                   => 'required',
            'password'               => 'required|min:8',
            'password_confirmation'  => 'required|min:8',
        ];
    }
}
