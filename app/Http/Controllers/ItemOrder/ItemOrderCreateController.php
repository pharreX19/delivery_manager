<?php
namespace App\Http\Controllers\ItemOrder;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemOrderCreateRequest;
use App\Domain\ItemOrder\ItemOrderCreateService;


class ItemOrderCreateController extends Controller{
    
    public function __invoke(ItemOrderCreateRequest $request, ItemOrderCreateService $itemOrderCreateService)
    {
        try{
            $itemOrder = $itemOrderCreateService->execute($request->validated());
            return response()->json([
                'object' => 'Item Order',
                'success_code' => 200,
                'success_message' => 'Item attached to Created Order Sucess',
                'data' => $itemOrder
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'Item Order',
                'failure_code' => 500,
                'failure_message' => 'Unexpected Error'
            ], 500);
        }
    }
}