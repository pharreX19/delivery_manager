<?php
namespace App\Http\Controllers\Customer;

use App\Domain\Customer\CustomerUpdateService;
use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerUpdateRequest;

class CustomerUpdateController extends Controller{
    
    public function __invoke(CustomerUpdateRequest $request, $id)
    {
        try{
            $staff = (new CustomerUpdateService($request))->execute();
            return response()->json([
                'object' => 'item',
                'success_code' => '200',
                'success_message' => 'Item Record Updated Success'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'item',
                'failure_code' => '404',
                'failure_message' => $e
            ], 500);
        }
    }
}