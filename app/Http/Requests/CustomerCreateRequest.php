<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
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
            'name' => [
                'required',
                'alpha_spaces',
                'min:5',
                'max:30'
            ],
            'contact_no' =>  [
                'required',
                'string',
                'max:20',
                'min:7',
            ],
            // 'address_id' => [
                // 'numeric',
                // 'exists:addresses,id',
                // 'required'
            // ]
        ];
    }
}
