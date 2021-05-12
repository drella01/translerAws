<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class TankTrailer extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id','madeof','fuel','volume','compartments','liters1','liters2','liters3','liters4','liters5','liters6',
        'degassed','counter','bombBrand','minLPM','maxLPM','hose','hose1Lenght','hose2Lenght',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

}
