<?php
namespace App\Http\Controllers\Order;

use Exception;
use App\Http\Controllers\Controller;
use App\Domain\Order\OrderUpdateService;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderUpdateController extends Controller{
    
    public function __invoke(OrderUpdateRequest $request, $id)
    {
        try{
            $order = (new OrderUpdateService($request))->execute();
            return response()->json([
                'object' => 'item',
                'success_code' => '200',
                'success_message' => 'Order Updated Success'
            ], 200);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'object' => 'Order',
                'failure_code' => '404',
                'failure_message' => 'No record found'
            ], 404);
        
        }catch(Exception $e){
            return response()->json([
                'object' => 'Order',
                'failure_code' => $e instanceof ValidationException ? 422 : 500,
                'failure_message' => $e instanceof ValidationException ? $e->errors() : $e->getMessage() ?? 'Unexpected Error'
            ], $e instanceof ValidationException ? 422 : 500);
        }
    }
}