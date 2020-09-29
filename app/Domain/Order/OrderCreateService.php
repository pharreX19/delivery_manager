<?php
namespace App\Domain\Order;

use App\Order;
use App\Customer;
use App\ItemOrder;

class OrderCreateService{

    public function execute(array $validatedRequest) {
        // dd($validatedRequest);
        // dd($validatedRequest['item_id']);
        $order = Order::create([
            'address_customer_id'=> $validatedRequest['address_customer_id']
        ]);
        // dd($order->status());
        // dd($order->items());
        ItemOrder::create([
            'item_id' => $validatedRequest['item_id'], 
            'quantity' => $validatedRequest['quantity'], 
            'price' => $validatedRequest['price'], 
            'order_id' => $order->id
            ]);
        // $order->status()->create(['status_id' => 1, 'order_id' => $order->id]);
        // $customer = Customer::find($validatedRequest['customer_id']);
        // $customer->address()->attach($validatedRequest['address_id'], ['order_id' => $order->id]);
        return $order;
    }
}