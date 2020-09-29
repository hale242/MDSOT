<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverLeaveLineApprove extends Model
{
    protected $table = 'driver_leave_line_approve';
    protected $primaryKey = 'driver_leave_line_approve_id';

    public function Position(){
        return $this->hasOne('App\Position', 'position_id', 'position_id');
    }
}
