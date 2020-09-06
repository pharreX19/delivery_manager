<?php
namespace App\Domain\Store;

use App\Store;
use Illuminate\Http\Request;

class StoreShowService{

    private $store;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    
    public function execute() {
        $this->store = Store::where('id', $this->request->id)->with(['address','staff', 'items', 'orders', 'user'])->firstOrFail();
        return $this->store;
    }
}