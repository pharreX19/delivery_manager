<?php

namespace App\Http\Controllers\Dashboard;

use App\Order;
use App\Customer;
use App\Domain\Dashboard\DashboardService;
use Illuminate\Http\Request;
use App\Domain\Order\OrderIndexService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $allowedIncludes = ['address'];
    protected $allowedFilters = [];
    protected $allowedSorts = ['created_at', 'id'];


    public function __invoke(){
        return $this->itemResponse((new DashboardService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
