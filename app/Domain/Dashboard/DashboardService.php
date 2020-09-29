<?php
namespace App\Domain\Dashboard;

use App\Order;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DashboardService{
    protected $allowedIncludes =[];
    protected $allowedFilters =[];
    protected $allowedSorts =[];

    public function __construct($allowedIncludes = [], $allowedFilters =[], $allowedSorts =[])
    {
        $this->allowedIncludes = $allowedIncludes;
        $this->allowedFilters = $allowedFilters;
        $this->allowedSorts = $allowedSorts;
    }

    public function execute() : Collection{
        // $orders = Order::select('orders.*')->with(['assignee', 'item' ,'status','address','customer'])->paginate();
        // return $orders;
        // dd($orders->load('address.customer'));
        // return $orders->load('address.customer');
        return QueryBuilder::for(Order::class)->select('orders.*')->with(['assignee', 'items' ,'status','orderAddress.address','orderCustomer.customer', 'comments'])->allowedIncludes($this->allowedIncludes)->allowedFilters($this->allowedFilters)->allowedSorts($this->allowedSorts)->get();
    }
}