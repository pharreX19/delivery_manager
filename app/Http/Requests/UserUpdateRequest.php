<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'password' => [
                'required',
                'max:50',
                'min:5',
                'string',
                'confirmed'
            ],
            'old_password' => [
                'required',
                'min:5',
                'max:50',
                'string'
            ]
        ];
    }
}
