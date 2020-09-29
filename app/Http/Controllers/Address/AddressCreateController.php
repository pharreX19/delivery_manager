<?php
namespace App\Http\Controllers\Address;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressCreateRequest;
use App\Domain\Address\AddressCreateService;


class AddressCreateController extends Controller{
    
    public function __invoke(AddressCreateRequest $request, AddressCreateService $addressCreateService)
    {
        try{
            $address = $addressCreateService->execute($request->validated());
            return response()->json([
                'object' => 'Customer',
                'success_code' => 200,
                'success_message' => 'Customer Created Sucess',
                'data' => $address
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'Customer',
                'failure_code' => 500,
                'failure_message' => 'Unexpected Error'.$e
            ], 500);
        }
    }
}