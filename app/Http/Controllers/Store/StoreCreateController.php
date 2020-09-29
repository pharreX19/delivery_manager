<?php
namespace App\Http\Controllers\Store;

use App\Domain\Store\StoreCreateService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreateRequest;
use Exception;

class StoreCreateController extends Controller{
    
    public function __invoke(StoreCreateRequest $request, StoreCreateService $staffCreateService)
    {
        try{
            $staffCreateService->execute($request->validated());
            return response()->json([
                'object' => 'Store',
                'success_code' => 200,
                'success_message' => 'Store Created Sucess'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'Store',
                'failure_code' => 422,
                'failure_message' => $e
            ], 422);
        }
    }
}