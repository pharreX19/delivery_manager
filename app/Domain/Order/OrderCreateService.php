<?php
namespace App\Domain\Order;

use App\Order;

class OrderCreateService{

    public function execute(array $validatedRequest) {
        return Order::create($validatedRequest);
    }
}