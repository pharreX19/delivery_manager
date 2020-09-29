<?php
namespace App\Http\Controllers\Order;

use App\Domain\Order\OrderShowService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderShowController extends Controller{
    
    public function __invoke(Request $request)
    {
        try{
            $order = (new OrderShowService($request))->execute();
            return $this->itemResponse($order);
        }catch(Exception $e){
            return response()->json([
                'object' => 'item',
                'failure_code' => '404',
                'failure_message' => 'Requested Record Not Found'
            ], 500);
        }
        
        
    }
    
}