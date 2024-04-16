<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'nif' => $row[0],
            'name' => $row[1],
            'address' => $row[2],
            'postal_code' => $row[3],
            'city' => $row[6],
            'provence' => $row[7],
            'phone1' => $row[4],
            'phone2' => $row[5],
            'email' => $row[9],
        ]);
    }
}
