<?php
namespace App\Http\Controllers\Address;

use App\Domain\Address\AddressUpdateService;
use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressUpdateRequest;

class AddressUpdateController extends Controller{
    
    public function __invoke(AddressUpdateRequest $request, $id)
    {
        try{
            $address = (new AddressUpdateService($request))->execute();
            return response()->json([
                'object' => 'item',
                'success_code' => '200',
                'success_message' => 'Address Record Updated Success'
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