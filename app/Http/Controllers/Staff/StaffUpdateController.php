<?php
namespace App\Http\Controllers\Staff;

use Exception;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffShowService;
use App\Domain\Staff\StaffUpdateService;
use App\Http\Requests\StaffUpdateRequest;

class StaffUpdateController extends Controller{
    
    public function __invoke(StaffUpdateRequest $request, $id)
    {
        try{
            $staff = (new StaffUpdateService($request))->execute();
            return response()->json([
                'object' => 'staff',
                'success_code' => '200',
                'success_message' => 'Staff Record Updated Success'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'staff',
                'fail_code' => '404',
                'fail_message' => $e
            ], 500);
        }
    }
}