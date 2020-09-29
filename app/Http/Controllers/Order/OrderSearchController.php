<?php
namespace App\Http\Controllers\Order;

use App\Domain\Order\OrderShowService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderSearchController extends Controller{
    
    public function __invoke(Request $request)
    {
        // dd('assasa');
        $order = (new OrderShowService($request))->search();
        return $this->paginatedResponse($order);
    }
    
}