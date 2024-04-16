<?php

namespace App\Imports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;

class InvoicesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([
            'id_extra' => $row[0],
            'number' => $row[1],
            'car_id' => $row[2],
            'kms' => $row[3],
            'base' => $row[5],
        ]);
    }
}
