<?php
namespace App\Domain\Customer;

use App\Item;
use App\Staff;
use App\Customer;
use Illuminate\Http\Request;

class CustomerShowService{

    private $customer;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    
    public function execute() {
        $this->customer = Customer::where('id', $this->request->id)->with(['address','orders'])->firstOrFail();
        return $this->customer;
    }
}