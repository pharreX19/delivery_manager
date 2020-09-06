<?php
namespace App\Http\Controllers\Customer;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerCreateRequest;
use App\Domain\Customer\CustomerCreateService;


class CustomerCreateController extends Controller{
    
    public function __invoke(CustomerCreateRequest $request, CustomerCreateService $customerCreateService)
    {
        try{
            $customerCreateService->execute($request->validated());
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