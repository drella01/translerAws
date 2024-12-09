<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Vehicle;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'url','vehicle_id','ordered','urlS3',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
