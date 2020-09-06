<?php
namespace App\Domain\Item;

use App\Item;
use App\Staff;

class ItemCreateService{

    public function execute(array $validatedRequest) {
        return Item::create($validatedRequest);
    }
}