<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
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
            'floor_no' => [
                'string',
                'nullable',
                'max:20'
            ],
            'block' => [
                'string',
                'nullable',
                'max:30'
            ],
            'road' => [
                'string',
                'nullable',
                'max:30'
            ],
            'building' => [
                'string',
                'nullable',
                'max:30'
            ],
            'island' => [
                'alpha_spaces',
                'nullable',
                'max:50'
            ],
            'country' => [
                'nullable',
                'max:50',
                'alpha_spaces'
            ]
        ];
    }
}
