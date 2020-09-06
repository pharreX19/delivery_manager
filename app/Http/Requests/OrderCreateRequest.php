<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
            'item_id' => [
                'required',
                'exists:items,id',
                'numeric'
            ],
            'quantity' => [
                'numeric',
                'max:100',
            ],
            'customer_id' => [
                'required',
                'numeric',
                'exists:customers,id'
            ],
            'staff_id' => [
                'sometimes',
                'numeric',
                'exists:staff,id'
            ],
            'status_id' => [
                'sometimes',
                'numeric',
                'exists:statuses,id'
            ],

        ];
    }
}
