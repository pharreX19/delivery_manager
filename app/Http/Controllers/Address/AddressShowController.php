<?php
namespace App\Http\Controllers\Address;

use App\Domain\Address\AddressShowService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffShowService;

class AddressShowController extends Controller{
    
    public function __invoke(Request $request)
    {
        $customer = (new AddressShowService($request))->execute();
        return $this->itemResponse($customer);
    }
}