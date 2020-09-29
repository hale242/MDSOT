<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverLeaveApprove extends Model
{
    protected $table = 'driver_leave_approve';
    protected $primaryKey = 'driver_leave_approve_id';

    public $Status = [
        0=>'รอส่งอนุมัติ',
        1=>'รออนุมัติ',
        2=>'อนุมัติ',
        98=>'ส่งกลับ',
        99=>'ไม่อนุมัติ'
    ];

    public function DriverLeaveLineApprove(){
        return $this->hasOne('App\DriverLeaveLineApprove', 'driver_leave_line_branch_id', 'driver_leave_line_branch_id');
    }
    public function AdminUser(){
        return $this->hasOne('App\AdminUser', 'admin_id', 'admin_id');
    }
    public function DriverMakingLeave(){
        return $this->hasOne('App\DriverMakingLeave', 'driver_making_leave_id', 'driver_making_leave_id');
    }

}
