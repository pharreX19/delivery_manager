<?php
namespace App\Domain\Item;

use App\Item;
use App\Staff;
use Illuminate\Http\Request;

class ItemShowService{

    private $staff;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    
    public function execute() {
        $this->staff = Item::where('id', $this->request->id)->with(['orders'])->firstOrFail();
        return $this->staff;
    }
}