<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
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
                'string',
                'max:50'
            ],
            'code' => [
                'sometimes',
                'nullable',
                'string',
                'unique:items,code,'.$this->id,
                'max:30'
            ],
            'description' => [
                'sometimes',
                'nullable',
                'string',
                'max:255'
            ],
            'order_id' => [
                'sometimes',
                'nullable',
                'numeric',
                'exists:orders,id',
            ]
        ];
    }
}
