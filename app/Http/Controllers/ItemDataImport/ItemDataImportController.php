<?php

namespace App\Http\Controllers\ItemDataImport;

use Exception;
use App\Http\Controllers\Controller;
use App\Imports\ItemDataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Item;
use Illuminate\Http\Request;

class ItemDataImportController extends Controller
{

    public function __invoke(Request $request)
    {
        
        $this->validate($request, ['select_file' => 'required|mimes:txt,csv']);
        
        try {

            $data = Excel::import(new ItemDataImport, request()->file('select_file'));
            return response()->json(['success_message' => 'Data uploaded Successfully', 'data' => $data],);

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            
            return response()->json(['failure_message' => 'Data failed to Upload', 'errors'=> $e->failures()]);

        }
    }
}
