<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverResign extends Model
{
    protected $table = 'driver_resign';
    protected $primaryKey = 'driver_resign_id';

    public $Status = [
        0=>'รออนุมัติลาออก',
        1=>'อนุมัติลาออก/ไล่ออก',
        2=>'ไม่อนุมัติลาออก/ไล่ออก',
        9=>'ยกเลิกการลาออก/ไล่ออก'
    ];

    public function AdminUser(){
        return $this->hasOne('\App\AdminUser', 'admin_id', 'admin_id');
    }
    public function Driver(){
        return $this->hasOne('\App\Driver', 'driver_id', 'driver_id');
    }
    public function ResignType(){
        return $this->hasOne('\App\ResignType', 'resign_type_id', 'resign_type_id');
    }
}
