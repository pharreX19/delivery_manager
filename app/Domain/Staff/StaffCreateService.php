<?php
namespace App\Domain\Staff;

use App\Staff;

class StaffCreateService{

    public function execute(array $validatedRequest) {
        
        return Staff::create($validatedRequest);
    }
}