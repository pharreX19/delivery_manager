<?php

namespace App\Http\Controllers\Item;

use App\Domain\Item\ItemIndexService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class ItemIndexController extends Controller
{
    protected $allowedIncludes = [];
    protected $allowedFilters = ['code'];
    protected $allowedSorts = ['created_at'];


    public function __invoke(){
        if(request()->query('perPage') == -1){
            return $this->itemResponse((new ItemIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());    
        }
        return $this->paginatedResponse((new ItemIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
