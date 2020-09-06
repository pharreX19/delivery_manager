<?php

namespace App\Http\Controllers\Item;

use App\Domain\Item\ItemIndexService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class ItemIndexController extends Controller
{
    protected $allowedIncludes = [];
    protected $allowedFilters = [];
    protected $allowedSorts = ['created_at', 'id'];


    public function __invoke(){
        return $this->paginatedResponse((new ItemIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
