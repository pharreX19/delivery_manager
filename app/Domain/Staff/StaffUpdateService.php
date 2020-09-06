<?php
namespace App\Domain\Staff;

use App\Http\Requests\StaffUpdateRequest;
use App\Staff;
use Exception;
use Illuminate\Http\Request;

class StaffUpdateService{

    private $staff;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->staff = Staff::where('id', $request->id)->firstOrFail();
    }

    
    public function execute() {
        if(! $this->request instanceof StaffUpdateRequest) throw new Exception();
        $validatedRequest = $this->request->validated();
        return $this->staff->update($validatedRequest);
    }
}