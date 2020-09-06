<?php
namespace App\Domain\Store;

use App\Http\Requests\StaffUpdateRequest;
use App\Store;
use Exception;
use Illuminate\Http\Request;

class StoreUpdateService{

    private $store;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->store = Store::where('id', $request->id)->firstOrFail();
    }

    
    public function execute() {
        if(! $this->request instanceof StaffUpdateRequest) throw new Exception();
        $validatedRequest = $this->request->validated();
        return $this->store->update($validatedRequest);
    }
}