<?php

namespace App\Imports;

use App\Car;
use Maatwebsite\Excel\Concerns\ToModel;

class CarsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Car([
            'registration' => $row[1],
            'id_extra' => $row[0],
            'brand' => $row[2],
            'model' => $row[3],
            'color' => $row[4],
            'car_frame' => $row[5],
            'name' => $row[6],
        ]);
    }
}
