<?php
namespace App\Http\Controllers\Item;

use App\Domain\Item\ItemDeleteService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffUpdateService;

class ItemDeleteController extends Controller{
    
    public function __invoke(Request $request)
    {
        try{
            $staff = (new ItemDeleteService($request))->execute();
            return response()->json([
                'object' => 'staff',
                'success_code' => '200',
                'success_message' => 'Staff Record Deleted Success'
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