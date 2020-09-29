<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverTestDriverTest extends Model
{
    protected $table = 'driver_test_driver_test';
    protected $primaryKey = 'driver_test_driver_test_id';

    public function DriverTestDriver(){
        return $this->hasOne('App\DriverTestDriver', 'driver_test_driver_id', 'driver_test_driver_id');
    }
}
