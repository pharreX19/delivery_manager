<?php

namespace App\Http\Requests;

use App\Item;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ItemOrderCreateRequest extends FormRequest
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
            'quantity' => [
                'required',
                'numeric',
                'min:1',
                'max:9999999',
            ],
            'order_id' => [
                'required',
                'numeric',
                'exists:orders,id',
                'in:'.implode("," , $this->getStoreOrderIds()),
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

    private function getStoreOrderIds() : array {
        $store_orders = Order::select('id')->where('store_id', Auth::user()->store_id)->get()->toArray();
        $order_ids = [];
        foreach($store_orders as $order){
            $order_ids[] = $order['id'];
        }
        return $order_ids;
    }
}
