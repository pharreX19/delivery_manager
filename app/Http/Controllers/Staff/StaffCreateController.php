<?php
namespace App\Http\Controllers\Staff;

use App\Domain\Staff\StaffCreateService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffCreateRequest;
use Exception;

class StaffCreateController extends Controller{
    
    public function __invoke(StaffCreateRequest $request, StaffCreateService $staffCreateService)
    {
        try{
            $staffCreateService->execute($request->validated());
            return response()->json([
                'object' => 'staff',
                'success_code' => 200,
                'success_message' => 'Staff Created Sucess'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'staff',
                'fail_code' => 422,
                'fail_message' => $e
            ], 422);
        }
    }
}