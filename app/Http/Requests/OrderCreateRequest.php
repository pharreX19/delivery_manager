<?php

namespace App\Http\Requests;

use App\Item;
use App\Staff;
use Illuminate\Support\Facades\Auth;
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
                'in:'.implode("," , $this->getStoreItemIds()),
                'numeric'
            ],
            'quantity' => [
                'required',
                'numeric',
                'min:1',
                'max:9999999',
            ],
            // 'customer_id' => [
            //     'required',
            //     'numeric',
            //     'exists:customers,id'
            // ],
            'staff_id' => [
                'sometimes',
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
                'required',
                'numeric',
                'min:1',
                'max:9999999',
            ],
            'address_customer_id' => [
                'required',
                'numeric',
                'exists:address_customers,id'
            ],
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
