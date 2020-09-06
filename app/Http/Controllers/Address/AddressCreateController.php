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
            $addressCreateService->execute($request->validated());
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