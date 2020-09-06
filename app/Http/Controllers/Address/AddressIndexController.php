<?php

namespace App\Http\Controllers\Address;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Address\AddressIndexService;

class AddressIndexController extends Controller
{
    protected $allowedIncludes = [''];
    protected $allowedFilters = ['status_id'];
    protected $allowedSorts = ['created_at', 'id'];

    public function __invoke(){
        return $this->paginatedResponse((new AddressIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());
    }
}
