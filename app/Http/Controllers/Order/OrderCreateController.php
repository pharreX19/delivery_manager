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
            $orderCreateService->execute($request->validated());
            return response()->json([
                'object' => 'Customer',
                'success_code' => 200,
                'success_message' => 'Customer Created Sucess'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'Customer',
                'fail_code' => 422,
                'fail_message' => $e
            ], 422);
        }
    }
}