<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class Axle extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id','brake','suspension','isDir','isDouble'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }


}
