<?php
namespace App\Domain\Item;

use App\Http\Requests\ItemUpdateRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Item;
use App\Staff;
use Exception;
use Illuminate\Http\Request;

class ItemUpdateService{

    private $item;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->item = Item::where('id', $request->id)->firstOrFail();
    }

    
    public function execute() {
        if(! $this->request instanceof ItemUpdateRequest) throw new Exception();
        $validatedRequest = $this->request->validated();
        return $this->item->update($validatedRequest);
    }
}