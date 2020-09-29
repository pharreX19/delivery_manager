<?php

namespace App\Http\Requests;

use App\Item;
use App\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
                'sometimes',
                'exists:items,id',
                'numeric',
                'in:'.implode("," , $this->getStoreItemIds()),
            ],
            'quantity' => [
                'sometimes',
                'min:1',
                'numeric',
                'max:9999999',
            ],
            // 'customer_id' => [
            //     'sometimes',
            //     'numeric',
            //     'exists:customers,id'
            // ],
            'staff_id' => [
                'required',
                'numeric',
                'exists:staff,id',
                'in:'.implode(",", $this->getStoreStaffIds())

            ],
            'status_id' => [
                'sometimes',
                'numeric',
                'exists:statuses,id'
            ],
            'price' => [
                'sometimes',
                'min:1',
                'numeric',
                'max:9999999',
            ],
            'address_customer_id' => [
                'sometimes',
                'numeric',
                'exists:address_customers,id'
            ],

        ];
    }

    public function messages(){
        return [
            'staff_id.required' => 'Order should be assigned before updating status'
        ];
    }

    private function getStoreItemIds() : array {
        $store_items = Item::select('id')->where('store_id', Auth::user()->store_id)->get()->toArray();
        $items_ids = [];
        foreach($store_items as $item){
            $items_ids[] = $item['id'];
        }
        return $items_ids;
    }

    private function getStoreStaffIds() : array {
        $store_staff = Staff::select('id')->where('store_id', Auth::user()->store_id)->get()->toArray();
        $staff_ids = [];
        foreach($store_staff as $staff){
            $staff_ids[] = $staff['id'];
        }
        return $staff_ids;
    }
}
