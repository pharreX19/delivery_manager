<?php
namespace App\Http\Controllers\Item;

use App\Domain\Item\ItemShowService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffShowService;

class ItemShowController extends Controller{
    
    public function __invoke(Request $request)
    {
        $staff = (new ItemShowService($request))->execute();
        return $this->itemResponse($staff);
    }
}