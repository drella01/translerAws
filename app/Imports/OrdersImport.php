<?php

namespace App\Imports;

use App\WorkOrder;
use Maatwebsite\Excel\Concerns\ToModel;

class OrdersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new WorkOrder([
            'id_extra' => $row[0],
            'invoice_id' => $row[1],
            'type' => $row[2],
            'key' => $row[3],
            'description' => $row[4],
            'hours' => $row[5],
            'price' => $row[6]
        ]);
    }
}
