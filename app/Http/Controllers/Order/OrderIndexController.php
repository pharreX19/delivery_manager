<?php

namespace App\Http\Controllers\Order;

use App\Order;
use App\Customer;
use Illuminate\Http\Request;
use App\Domain\Order\OrderIndexService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderIndexController extends Controller
{
    protected $allowedIncludes = ['address'];
    protected $allowedFilters = ['status_id', 'orderCustomer.customer.name','orderCustomer.customer.contact_no'];
    protected $allowedSorts = ['created_at', 'id'];


    public function __invoke(){
        return $this->paginatedResponse((new OrderIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
