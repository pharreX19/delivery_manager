<?php

namespace App\Imports;

use App\Item;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;

class ItemDataImport implements OnEachRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $row = $row->toArray();

        Item::updateOrCreate([
            'code' => $row[1]
        ], 
        [
            'name' => $row[0], 
            'description' => $row[2], 
        ]);
    }
}
