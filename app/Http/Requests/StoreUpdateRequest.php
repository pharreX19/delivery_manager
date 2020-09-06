<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> [
                'string',
                'sometimes',
                'max:30'
            ],
            'registration'=> [
                'string',
                'nullable',
                'max:30'
            ],
            'contact_no'=> [
                'string',
                'nullable',
                'max:10'
            ],
            'address_id'=> [
                'nullable',
                'exits:Address,id',
                'numeric'
            ],            
        ];
    }
}
