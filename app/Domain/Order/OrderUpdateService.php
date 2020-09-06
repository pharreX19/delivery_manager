<?php
namespace App\Domain\Order;

use App\Order;
use App\Http\Requests\OrderUpdateRequest;
use Exception;
use Illuminate\Http\Request;

class OrderUpdateService{

    private $order;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->order = Order::where('id', $request->id)->firstOrFail();
    }

    
    public function execute() {
        if(! $this->request instanceof OrderUpdateRequest) throw new Exception();
        $validatedRequest = $this->request->validated();
        return $this->order->update($validatedRequest);
    }
}