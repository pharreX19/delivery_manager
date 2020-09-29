<?php
namespace App\Http\Controllers\AddressCustomer;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressCustomerCreateRequest;
use App\Domain\AddressCustomer\AddressCustomerCreateService;


class AddressCustomerCreateController extends Controller{
    
    public function __invoke(AddressCustomerCreateRequest $request, AddressCustomerCreateService $addressCustomerCreateService)
    {
        try{
            $addressCustomer = $addressCustomerCreateService->execute($request->validated());
            return response()->json([
                'object' => 'Address Customer',
                'success_code' => 200,
                'success_message' => 'Address attached to Customer Created Sucess',
                'data' => $addressCustomer
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'Customer',
                'failure_code' => 500,
                'failure_message' => 'Unexpected Error'
            ], 500);
        }
    }
}