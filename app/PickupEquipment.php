<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PickupEquipment extends Model
{
    protected $table = 'pickup_equipment';
    protected $primaryKey = 'pickup_equipment_id';

    public function Driver(){
        return $this->hasOne('App\Driver', 'driver_id', 'driver_id');
    }

}
