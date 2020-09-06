<?php
namespace App\Domain\Order;

use App\Order;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\QueryBuilder;

class OrderIndexService{
    protected $allowedIncludes =[];
    protected $allowedFilters =[];
    protected $allowedSorts =[];

    public function __construct($allowedIncludes = [], $allowedFilters =[], $allowedSorts =[])
    {
        $this->allowedIncludes = $allowedIncludes;
        $this->allowedFilters = $allowedFilters;
        $this->allowedSorts = $allowedSorts;
    }

    public function execute() : Paginator{
        // $orders = Order::select('orders.*')->with(['assignee', 'item' ,'status','address','customer'])->paginate();
        // return $orders;
        // dd($orders->load('address.customer'));
        // return $orders->load('address.customer');
        return QueryBuilder::for(Order::class)->select('orders.*')->with(['assignee', 'item' ,'status','customer.address'])->allowedIncludes($this->allowedIncludes)->allowedFilters($this->allowedFilters)->allowedSorts($this->allowedSorts)->simplePaginate();
    }
}