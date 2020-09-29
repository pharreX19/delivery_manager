<?php
namespace App\Http\Controllers\Item;

use Exception;
use App\Http\Controllers\Controller;
use App\Domain\Item\ItemCreateService;
use App\Http\Requests\ItemCreateRequest;


class ItemCreateController extends Controller{
    
    public function __invoke(ItemCreateRequest $request, ItemCreateService $itemCreateService)
    {
        try{
            $item = $itemCreateService->execute($request->validated());
            return response()->json([
                'object' => 'item',
                'success_code' => 200,
                'success_message' => 'Item Created Sucess',
                'data' => $item
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'item',
                'failure_code' => 500,
                'failure_message' => "Unexpected Error"
            ], 500);
        }
    }
}