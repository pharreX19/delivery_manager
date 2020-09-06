<?php
namespace App\Domain\Staff;

use App\Staff;
use Illuminate\Http\Request;

class StaffShowService{

    private $staff;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    
    public function execute() {
        $this->staff = Staff::where('id', $this->request->id)->with(['deliveries'])->firstOrFail();
        return $this->staff;
    }
}