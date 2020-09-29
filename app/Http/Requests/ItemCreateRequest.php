<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemCreateRequest extends FormRequest
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
                'string',
                'max:50'
            ],
            'code' => [
                'required',
                'unique:items,code',
                'string',
                'max:30'
            ],
            'description' => [
                'nullable',
                'string',
                'max:255'
            ],
            'order_id' => [
                'nullable',
                'numeric',
                'exists:orders,id'
            ],
        ];
    }
}
