<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverInterview extends Model
{
    protected $table = 'driver_interview';
    protected $primaryKey = 'driver_interview_id';

    public $statusInterview = [
        0 => 'รอเรียกสัมภาษณ์งาน',
        1 => 'กำลังสัมภาษณ์งาน',
        9 => 'จบการสัมภาษณ์',
    ];

    public function Driver(){
        return $this->hasOne('\App\Driver', 'driver_id', 'driver_id');
    }
    public function DriverCriminalRecordPass(){
        return $this->hasOne('\App\DriverCriminalRecord', 'driver_interview_id', 'driver_interview_id')->where('driver_criminal_record_status', 1);
    }
    public function DriverPersonalityTest(){
        return $this->hasMany('\App\DriverPersonalityTest', 'driver_interview_id', 'driver_interview_id');
    }
    public function DriverTestDriverTest(){
        return $this->hasMany('\App\DriverTestDriverTest', 'driver_interview_id', 'driver_interview_id');
    }
    public function DriverTestTextTest(){
        return $this->hasMany('\App\DriverTestTextTest', 'driver_interview_id', 'driver_interview_id');
    }
}
