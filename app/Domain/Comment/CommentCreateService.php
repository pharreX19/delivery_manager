<?php
namespace App\Domain\Customer;

use App\Customer;

class CustomerCreateService{

    public function execute(array $validatedRequest) {
        return Customer::create($validatedRequest);
    }
}