<?php
namespace App\Domain\Store;

use App\Store;

class StoreCreateService{

    public function execute(array $validatedRequest) {
        return Store::create($validatedRequest);
    }
}