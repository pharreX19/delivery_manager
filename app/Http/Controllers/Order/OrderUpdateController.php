<?php
namespace App\Http\Controllers\Order;

use App\Domain\Order\OrderUpdateService;
use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;

class OrderUpdateController extends Controller{
    
    public function __invoke(OrderUpdateRequest $request, $id)
    {
        try{
            $order = (new OrderUpdateService($request))->execute();
            return response()->json([
                'object' => 'item',
                'success_code' => '200',
                'success_message' => 'Address Record Updated Success'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'item',
                'fail_code' => '404',
                'fail_message' => $e
            ], 500);
        }
    }
}