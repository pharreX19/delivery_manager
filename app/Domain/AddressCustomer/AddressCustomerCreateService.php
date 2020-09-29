<?php
namespace App\Domain\AddressCustomer;

use App\Address;
use App\AddressCustomer;
use App\Customer;

class AddressCustomerCreateService{

    public function execute(array $validatedRequest) {
        return AddressCustomer::create($validatedRequest);
        // dd($address->id);
        // return $address->customer()->attach($validatedRequest['customer_id']);
        // dd($address->attach());
        // return 
    }
}