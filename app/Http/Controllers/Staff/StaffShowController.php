<?php
namespace App\Http\Controllers\Staff;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffShowService;

class StaffShowController extends Controller{
    
    public function __invoke(Request $request)
    {
        $staff = (new StaffShowService($request))->execute();
        return $this->itemResponse($staff);
    }
}