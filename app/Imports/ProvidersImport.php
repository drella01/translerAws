<?php

namespace App\Imports;

use App\Provider;
use Maatwebsite\Excel\Concerns\ToModel;

class ProvidersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Provider([
            'cif' => $row[6],
            'id_extra' => $row[0],
            'key' => $row[1],
            'name' => $row[2],
            'address' => $row[3],
            'postal_code' => $row[5],
            'phone' => $row[7],
        ]);
    }
}
