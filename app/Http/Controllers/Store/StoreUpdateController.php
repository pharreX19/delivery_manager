<?php
namespace App\Http\Controllers\Store;

use Exception;
use App\Http\Controllers\Controller;
use App\Domain\Store\StoreUpdateService;
use App\Http\Requests\StoreUpdateRequest;

class StoreUpdateController extends Controller{
    
    public function __invoke(StoreUpdateRequest $request, $id)
    {
        try{
            $staff = (new StoreUpdateService($request))->execute();
            return response()->json([
                'object' => 'Store',
                'success_code' => '200',
                'success_message' => 'Store Record Updated Success'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'Store',
                'failure_code' => '404',
                'failure_message' => $e
            ], 500);
        }
    }
}