<?php
namespace App\Domain\Item;

use App\Item;
use App\Staff;
use Exception;
use Illuminate\Http\Request;

class ItemDeleteService{

    private $staff;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->staff = Item::where('id', $request->id)->firstOrFail();
    }

    
    public function execute() {
        return $this->staff->delete();
    }
}