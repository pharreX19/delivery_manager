<?php
namespace App\Http\Controllers\Item;

use Exception;
use App\Http\Controllers\Controller;
use App\Domain\Item\ItemUpdateService;
use App\Domain\Staff\StaffShowService;
use App\Domain\Staff\StaffUpdateService;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Requests\StaffUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemUpdateController extends Controller{
    
    public function __invoke(ItemUpdateRequest $request, $id)
    {
        try{
            $staff = (new ItemUpdateService($request))->execute();
            return response()->json([
                'object' => 'item',
                'success_code' => '200',
                'success_message' => 'Item Record Updated Success'
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
                'failure_code' => 500,
                'failure_message' => 'Unexpected Error'
            ], 500);
        }
    }
}