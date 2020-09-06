<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
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
                'sometimes',
                'nullable',
                'alpha_spaces',
                'unique:staff,name',
                'max:30',
            ],
            'contact_no' => [
                'sometimes',
                'nullable',
                'string',
                'min:7',
                'max:20'
            ],
            'joined_at' => [
                'nullable',
                'date'
            ],
            'country' => [
                'sometimes',
                'nullable',
                'alpha_spaces',
                'min:5'
            ],
            'store_id' => [
                'sometimes',
                'numeric',
                'exists:store,id'
            ]
         ];
    }
}
