<?php
namespace App\Domain\ItemOrder;

use App\Address;
use App\ItemOrder;
use App\Customer;

class ItemOrderCreateService{

    public function execute(array $validatedRequest) {
        return ItemOrder::create($validatedRequest);
        // dd($address->id);
        // return $address->customer()->attach($validatedRequest['customer_id']);
        // dd($address->attach());
        // return 
    }
}