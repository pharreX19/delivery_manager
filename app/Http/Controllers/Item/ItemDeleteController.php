<?php
namespace App\Http\Controllers\Item;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Item\ItemDeleteService;
use App\Domain\Staff\StaffUpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemDeleteController extends Controller{
    
    public function __invoke(Request $request)
    {
        try{
            $staff = (new ItemDeleteService($request))->execute();
            return response()->json([
                'object' => 'staff',
                'success_code' => '200',
                'success_message' => 'Item deleted successfully'
            ], 200);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'object' => 'item',
                'failure_code' => '404',
                'failure_message' => 'No record found'
            ], 404);
        
        }catch(Exception $e){
            return response()->json([
                'object' => 'item',
                'failure_code' => 'Unexpected Error',
                'failure_message' => ''
            ], 500);
        }
    }
}