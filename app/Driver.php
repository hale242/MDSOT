<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Driver extends Model
{
    protected $table = 'driver';
    protected $primaryKey = 'driver_id';

    public $statusFamily = [
        1 => 'โสด',
        2 => 'สมรสจดทะเบียน',
        3 => 'สมรสไม่จดทะเบียน',
        4 => 'หย่า',
        5 => 'หม้าย',
    ];
    public $statusLiving = [
        1 => 'ยังมีชัวิตอยู่',
        2 => 'ถึงแก่กรรม',
    ];
    public $statusDriverMilitary = [
        1 => 'รอเกณฑ์ทหาร',
        2 => 'ผ่านการเกณฑ์ทหารแล้ว',
        3 => 'ได้รับการยกเว้นโดยการเรียน ร.ด.',
        4 => 'ได้รับการยกเว้น',
    ];
    public $statusDriverVehicle = [
        0 => 'ไม่มี',
        1 => 'มี',
    ];
    public $statusJobApp = [
        0 => 'รอเรียกสัมภาษณ์งาน',
        1 => 'ผ่านสัมภาษณ์งานรอบแรก',
        2 => 'ผ่านการทดสอบข้อสอบ (เตรียมทดสอบขับรถ)',
        3 => 'ตกการทดสอบข้อสอบ (ให้ทดสอบขับรถ) (เตรียมทดสอบขับรถ)',
        4 => 'ผ่านการทดสอบขับรถ',
        90 => 'ตกการทดสอบรอบแรก',
        91 => 'ตกการทดสอบข้อสอบ (กลับบ้าน)',
        92 => 'ตกการทดสอบขับรถ',
        98 => 'ให้กลับมาทดสอบใหม่ได้',
        99 => 'ห้ามกลับมาสมัครใหม่',
    ];
    public $statusJobAppColor = [
        0 => '#ffc36d',
        1 => '#2eb82e',
        2 => '#2eb82e',
        3 => '#ff8000',
        4 => '#2eb82e',
        90 => '#ff8000',
        91 => '#ff8000',
        92 => '#ff8000',
        98 => '#ffc36d',
        99 => '#ff471a',
    ];

    public function PathImage()
    {
        return 'uploads/JobRegister/';
    }

    public function viewImage()
    {
        $image  = 'uploads/images/no-image.jpg';
        if ($this->driver_image) {
            if (File::exists($this->PathImage().$this->driver_image)) {
                $image = $this->PathImage().$this->driver_image;
            }
        }
        return $image;
    }

    public function RecruitmentPosition(){
        return $this->hasOne('App\RecruitmentPosition', 'recruitment_position_id', 'recruitment_position_id');
    }
    public function Gender(){
        return $this->hasOne('App\Gender', 'gender_id', 'gender_id');
    }
    public function NamePrefix(){
        return $this->hasOne('App\NamePrefix', 'name_prefix_id', 'name_prefix_id');
    }
    public function TypeJobNew(){
        return $this->hasOne('App\TypeJobNew', 'type_job_new_id', 'type_job_new_id');
    }
    public function Districts(){
        return $this->hasOne('App\Districts', 'districts_id', 'districts_id');
    }
    public function RegisteredDistricts(){
        return $this->hasOne('App\Districts', 'districts_id', 'driver_registered_address_districts_id');
    }
    public function DriverInterview(){
        return $this->hasOne('App\DriverInterview', 'driver_id', 'driver_id')->orderBy('driver_interview_id', 'desc');
    }
    public function Brethren(){
        return $this->hasMany('App\Brethren', 'driver_id', 'driver_id')->orderBy('brethren_z_index', 'asc');
    }
    public function DriverEmergencyContact(){
        return $this->hasMany('App\DriverEmergencyContact', 'driver_id', 'driver_id');
    }
    public function DriverFile(){
        return $this->hasMany('App\DriverFile', 'driver_id', 'driver_id');
    }
    public function DriverLanguage(){
        return $this->hasMany('App\DriverLanguage', 'driver_id', 'driver_id');
    }
    public function DriverReference(){
        return $this->hasMany('App\DriverReference', 'driver_id', 'driver_id');
    }
    public function EducationDriver(){
        return $this->hasMany('App\EducationDriver', 'driver_id', 'driver_id');
    }
    public function EducationDriverLast(){
        return $this->hasOne('App\EducationDriver', 'driver_id', 'driver_id')->orderBy('education_driver_status', 'desc');
    }
    public function JobAnswer(){
        return $this->hasMany('App\JobAnswer', 'driver_id', 'driver_id');
    }
    public function TrainingRecord(){
        return $this->hasMany('App\TrainingRecord', 'driver_id', 'driver_id');
    }
    public function WorkHistory(){
        return $this->hasMany('App\WorkHistory', 'driver_id', 'driver_id');
    }
    public function DriverResign(){
        return $this->hasOne('App\DriverResign', 'driver_id', 'driver_id');
    }
}
