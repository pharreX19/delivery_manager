<?php
namespace App\Http\Controllers\Customer;

use App\Domain\Customer\CustomerShowService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffShowService;

class CustomerShowController extends Controller{
    
    public function __invoke(Request $request)
    {
        $customer = (new CustomerShowService($request))->execute();
        return $this->itemResponse($customer);
    }
}