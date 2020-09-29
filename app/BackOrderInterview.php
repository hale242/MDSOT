<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackOrderInterview extends Model
{
    protected $table = 'back_order_interviwe';
    protected $primaryKey = 'back_order_interviwe_id';

    public function Driver(){
        return $this->hasOne('App\Driver', 'driver_id', 'driver_id');
    }

}
