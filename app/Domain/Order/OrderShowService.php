<?php
namespace App\Domain\Order;


use App\Order;
use Illuminate\Http\Request;

class OrderShowService{

    private $order;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    
    public function execute() {
        $this->order = Order::where('id', $this->request->id)->with(['item','assignee','status','customer.address'])->firstOrFail();
        return $this->order;
    }
}