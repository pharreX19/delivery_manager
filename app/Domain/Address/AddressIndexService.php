<?php
namespace App\Domain\Address;

use App\Order;
use App\Address;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class AddressIndexService{
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
        return QueryBuilder::for(Address::class)->select('addresses.*')->with(['customer', 'orders'])->allowedIncludes($this->allowedIncludes)->allowedFilters($this->allowedFilters)->allowedSorts($this->allowedSorts)->get();
    }
}