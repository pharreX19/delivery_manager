<?php
namespace App\Http\Controllers\Staff;

use Exception;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffShowService;
use App\Domain\Staff\StaffUpdateService;
use App\Http\Requests\StaffUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        }catch(ModelNotFoundException $e){
            return response()->json([
                'object' => 'staff',
                'failure_code' => '404',
                'failure_message' => 'No record found'
            ], 404);
        
        }catch(Exception $e){
            return response()->json([
                'object' => 'staff',
                'failure_code' => 500,
                'failure_message' => 'Unexpected Error'
            ], 500);
        }
    }
}