<?php
namespace App\Domain\Address;

use App\Address;
use App\AddressCustomer;
use App\Customer;

class AddressCreateService{

    public function execute(array $validatedRequest) {
        $address = Address::create($validatedRequest);
        return AddressCustomer::create([
            'address_id' => $address->id,
            'customer_id' => $validatedRequest['customer_id']
        ]);
        // dd($address->id);
        // return $address->customer()->attach($validatedRequest['customer_id']);
        // dd($address->attach());
        // return 
    }
}