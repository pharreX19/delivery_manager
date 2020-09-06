<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffCreateRequest extends FormRequest
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
                'unique:staff,name',
                'max:30',
            ],
            'contact_no' => [
                'required',
                'string',
                'min:7',
                'max:20'
            ],
            'joined_at' => [
                'nullable',
                'date'
            ],
            'country' => [
                'alpha_spaces',
                'min:5'
            ],
            'store_id' => [
                'required',
                'numeric',
                'exists:store,id'
            ]
         ];
    }
}
