<?php
namespace App\Http\Controllers\Item;

use App\Domain\Item\ItemUpdateService;
use Exception;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffShowService;
use App\Domain\Staff\StaffUpdateService;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Requests\StaffUpdateRequest;

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
        }catch(Exception $e){
            return response()->json([
                'object' => 'item',
                'fail_code' => '404',
                'fail_message' => $e
            ], 500);
        }
    }
}