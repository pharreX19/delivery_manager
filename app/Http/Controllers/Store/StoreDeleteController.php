<?php
namespace App\Http\Controllers\Store;

use App\Domain\Store\StoreDeleteService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreDeleteController extends Controller{
    
    public function __invoke(Request $request)
    {
        try{
            $staff = (new StoreDeleteService($request))->execute();
            return response()->json([
                'object' => 'Store',
                'success_code' => '200',
                'success_message' => 'Store Record Deleted Success'
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