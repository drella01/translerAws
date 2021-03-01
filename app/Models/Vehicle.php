<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Type;
use App\Models\Photo;
use App\Models\Document;
use App\Models\InfoVehicle;
use App\Models\Rent;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand','model','registration','reg_date','kms','type_id','tara','mma','sale_price','rent_price','description'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function pdf()
    {
        return $this->hasOne(InfoVehicle::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }
}
