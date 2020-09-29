<?php
namespace App\Http\Controllers\Staff;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffDeleteService;
use App\Domain\Staff\StaffUpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StaffDeleteController extends Controller{
    
    public function __invoke(Request $request)
    {
        try{
            $staff = (new StaffDeleteService($request))->execute();
            return response()->json([
                'object' => 'staff',
                'success_code' => '200',
                'success_message' => 'Staff Record Deleted Success'
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
                'failure_code' => 'Unexpected Error',
                'failure_message' => ''
            ], 500);
        }
    }
}