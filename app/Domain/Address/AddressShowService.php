<?php
namespace App\Domain\Address;

use App\Item;
use App\Staff;
use App\Address;
use Illuminate\Http\Request;

class AddressShowService{

    private $address;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    
    public function execute() {
        $this->address = Address::where('id', $this->request->id)->with(['customer'])->firstOrFail();
        return $this->address;
    }
}