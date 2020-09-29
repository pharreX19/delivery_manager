<?php
namespace App\Domain\Order;


use App\Item;
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
        $this->order = Order::where('id', $this->request->id)->with(['items','assignee','status','customer', 'orderAddress.address','orderCustomer.customer','comments'])->firstOrFail();
        return $this->order;
    }

    public function search() {
        // dd($this->request->query('search'));
        $this->order = Item::where('name','LIKE' , '%'.$this->request->query('search').'%')->orWhere('code','LIKE' , '%'.$this->request->query('search').'%')->with(['orders.assignee','orders.status','orders.customer', 'orders.orderAddress.address','orders.orderCustomer.customer'])->simplePaginate();
        return $this->order;
    }
}

