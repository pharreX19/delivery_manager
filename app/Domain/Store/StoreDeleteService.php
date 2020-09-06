<?php
namespace App\Domain\Store;

use App\Store;
use Exception;
use Illuminate\Http\Request;

class StoreDeleteService{

    private $store;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->store = Store::where('id', $request->id)->firstOrFail();
    }

    
    public function execute() {
        return $this->store->delete();
    }
}