<?php
namespace App\Domain\Customer;

use App\Order;
use App\Address;
use App\Customer;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class CustomerIndexService{
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
        
        return QueryBuilder::for(Customer::class)->select('customers.*')->with(['address', 'orders','orders.items','orders.assignee', 'orders.status'])->allowedIncludes($this->allowedIncludes)->allowedFilters($this->allowedFilters)->allowedSorts($this->allowedSorts)->get();
    }
}