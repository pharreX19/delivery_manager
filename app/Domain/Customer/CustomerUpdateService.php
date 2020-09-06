<?php
namespace App\Domain\Customer;

use App\Customer;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Item;
use App\Staff;
use Exception;
use Illuminate\Http\Request;

class CustomerUpdateService{

    private $customer;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->customer = Customer::where('id', $request->id)->firstOrFail();
    }

    
    public function execute() {
        if(! $this->request instanceof CustomerUpdateRequest) throw new Exception();
        $validatedRequest = $this->request->validated();
        return $this->customer->update($validatedRequest);
    }
}