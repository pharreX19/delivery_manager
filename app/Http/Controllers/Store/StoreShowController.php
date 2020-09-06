<?php
namespace App\Http\Controllers\Store;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Store\StoreShowService;

class StoreShowController extends Controller{
    
    public function __invoke(Request $request)
    {
        $staff = (new StoreShowService($request))->execute();
        return $this->itemResponse($staff);
    }
}