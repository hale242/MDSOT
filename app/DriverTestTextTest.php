<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverTestTextTest extends Model
{
    protected $table = 'driver_test_text_test';
    protected $primaryKey = 'driver_test_text_test_id';

    public function DriverTestText(){
        return $this->hasOne('\App\DriverTestText', 'driver_test_text_id', 'driver_test_text_id');
    }
}
