<?php
namespace App\Domain\Staff;

use App\Staff;
use Exception;
use Illuminate\Http\Request;

class StaffDeleteService{

    private $staff;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->staff = Staff::where('id', $request->id)->firstOrFail();
    }

    
    public function execute() {
        return $this->staff->delete();
    }
}