<?php

namespace BitzenTecnologia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserResquest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'roles' => 'required'
        ];
    }
}
