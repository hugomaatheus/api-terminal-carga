<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carman extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'cnh', 'vehicleKind', 'full', 'gotVehicle', 'truck_id'];

    public function truck()
    {
        return $this->hasOne('App\Truck');
    }

}
