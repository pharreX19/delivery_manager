<?php
namespace App\Domain\Item;

use App\Item;
use App\Order;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ItemIndexService{
    protected $allowedIncludes =[];
    protected $allowedFilters =[];
    protected $allowedSorts =[];

    public function __construct($allowedIncludes = [], $allowedFilters =[], $allowedSorts =[])
    {
        $this->allowedIncludes = $allowedIncludes;
        $this->allowedFilters = $allowedFilters;
        $this->allowedSorts = $allowedSorts;
    }

    public function execute() {

        $query = QueryBuilder::for(Item::class)->select('items.*')->with(['orders'])->allowedIncludes($this->allowedIncludes)->allowedFilters($this->allowedFilters, AllowedFilter::exact('code'))->allowedSorts($this->allowedSorts);

        if(request()->query('perPage') == -1){
            return $query->get();
        }
        return $query->paginate(15);
    }
}