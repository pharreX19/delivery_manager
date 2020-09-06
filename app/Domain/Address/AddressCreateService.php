<?php
namespace App\Domain\Address;

use App\Address;

class AddressCreateService{

    public function execute(array $validatedRequest) {
        return Address::create($validatedRequest);
    }
}