<?php
namespace App\Domain\Address;

use App\Address;
use App\Http\Requests\AddressUpdateRequest;
use Exception;
use Illuminate\Http\Request;

class AddressUpdateService{

    private $customer;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->address = Address::where('id', $request->id)->firstOrFail();
    }

    
    public function execute() {
        if(! $this->request instanceof AddressUpdateRequest) throw new Exception();
        $validatedRequest = $this->request->validated();
        return $this->address->update($validatedRequest);
    }
}