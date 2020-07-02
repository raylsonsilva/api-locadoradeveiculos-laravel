<?php

namespace BitzenTecnologia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'guard_name' => 'required|max:255',
            'permissions' => 'required|max:255'
        ];
    }
}
