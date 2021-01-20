<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndikatorRequest extends FormRequest
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
            'nama_indikator' => 'required',
            'ket_indikator'  => 'required',
            'pertanyaan'     => 'required',
            'domain_id'      => 'required',
            'aspek_id'       => 'required',
            'level0'         => 'required',
            'level1'         => 'required',
            'level2'         => 'required',
            'level3'         => 'required',
            'level4'         => 'required',
            'level5'         => 'required',
            'petunjuk'       => 'required',
            'users'          => 'array|required',
        ];
    }
}
