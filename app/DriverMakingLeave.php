<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverMakingLeave extends Model
{
    protected $table = 'driver_making_leave';
    protected $primaryKey = 'driver_making_leave_id';

    public $Type = [
        1=>'ลาเต็มวัน',
        2=>'ลาครึ่งวันเช้า',
        3=>'ลาครึ่งวันบ่าย'
    ];

    public $Status = [
        0=>'รออนุมัติ',
        1=>'อนุมัติ',
        2=>'ส่งกลับแก้ไข',
        8=>'ยกเลิกการลา',
        9=>'ไม่อนุมัติ'
    ];

    public function Driver(){
        return $this->hasOne('\App\Driver', 'driver_id', 'driver_id');
    }
    public function DriverLeaveLineBranch(){
        return $this->hasOne('\App\DriverLeaveLineBranch', 'driver_leave_line_branch_id', 'driver_leave_line_branch_id');
    }
    public function LeaveType(){
        return $this->hasOne('\App\LeaveType', 'leave_type_id', 'leave_type_id');
    }
    public function DriverLeaveApprove(){
        return $this->hasMany('\App\DriverLeaveApprove', 'driver_making_leave_id', 'driver_making_leave_id');
    }
}
