<?php

namespace App\Imports;

use App\SparePart;
use Maatwebsite\Excel\Concerns\ToModel;

class SparePartsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SparePart([
            'key' => $row[0],
            'description' => $row[1],
            'purchase_price' => $row[3],
            'sale_price' => $row[2],
        ]);
    }
}
