<?php
namespace App\Domain\Comment;

use App\Order;
use App\Address;
use App\Comment;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\Pagination\Paginator;

class CommentIndexService{
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
        return QueryBuilder::for(Comment::class)->select('comments.*')->with(['order'])->allowedIncludes($this->allowedIncludes)->allowedFilters($this->allowedFilters)->allowedSorts($this->allowedSorts)->simplePaginate();
    }
}