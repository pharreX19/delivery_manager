<?php

namespace App\Http\Controllers\Store;

use App\Domain\Store\StoreIndexService;
use App\Http\Controllers\Controller;

class StoreIndexController extends Controller
{
    protected $allowedIncludes = [''];
    protected $allowedFilters = [''];
    protected $allowedSorts = ['created_at', 'id'];


    public function __invoke(){
        return $this->paginatedResponse((new StoreIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
