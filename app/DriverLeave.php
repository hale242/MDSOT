<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverLeave extends Model
{
    protected $table = 'driver_leave';
    protected $primaryKey = 'driver_leave_id';

    public function Driver(){
        return $this->hasOne('\App\Driver', 'driver_id', 'driver_id');
    }

    public function LeaveType(){
        return $this->hasOne('\App\LeaveType', 'leave_type_id', 'leave_type_id');
    }
}
