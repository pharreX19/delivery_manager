<?php

namespace App\Http\Controllers\Customer;

use App\Domain\Customer\CustomerIndexService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerIndexController extends Controller
{
    protected $allowedIncludes = [''];
    protected $allowedFilters = [''];
    protected $allowedSorts = ['created_at', 'id'];


    public function __invoke(){
        return $this->paginatedResponse((new CustomerIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
