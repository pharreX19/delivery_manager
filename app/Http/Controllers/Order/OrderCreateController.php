<?php
namespace App\Http\Controllers\Order;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Domain\Order\OrderCreateService;


class OrderCreateController extends Controller{
    
    public function __invoke(OrderCreateRequest $request, OrderCreateService $orderCreateService)
    {
        try{
            $order = $orderCreateService->execute($request->validated());
            return response()->json([
                'object' => 'Order',
                'success_code' => 200,
                'success_message' => 'Order Created Sucess',
                'data' => $order
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'Order',
                'failure_code' => 500,
                'failure_message' => $e
            ], 500);
        }
    }
}