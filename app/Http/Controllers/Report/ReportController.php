<?php

namespace App\Http\Controllers\Report;

use App\Order;
use App\Customer;
use Illuminate\Http\Request;
use App\Domain\Report\ReportService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    protected $allowedIncludes = ['address'];
    protected $allowedFilters = ['status_id', 'orderCustomer.customer.name','orderCustomer.customer.contact_no'];
    protected $allowedSorts = ['created_at', 'id'];


    public function __invoke(){
        return $this->itemResponse((new ReportService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
