<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverPersonalityTest extends Model
{
    protected $table = 'driver_personality_test';
    protected $primaryKey = 'driver_personality_test_id';

    public function DriverPersonality(){
        return $this->hasOne('App\DriverPersonality', 'driver_personality_id', 'driver_personality_id');
    }
}
