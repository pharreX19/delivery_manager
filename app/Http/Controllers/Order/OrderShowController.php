<?php
namespace App\Http\Controllers\Order;

use App\Domain\Order\OrderShowService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderShowController extends Controller{
    
    public function __invoke(Request $request)
    {
        $order = (new OrderShowService($request))->execute();
        return $this->itemResponse($order);
    }
}