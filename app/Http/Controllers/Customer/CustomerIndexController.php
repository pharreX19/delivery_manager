<?php

namespace App\Http\Controllers\Customer;

use App\Domain\Customer\CustomerIndexService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerIndexController extends Controller
{
    protected $allowedIncludes = [''];
    protected $allowedFilters = [''];
    protected $allowedSorts = [''];


    public function __invoke(){
        return $this->itemResponse((new CustomerIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
