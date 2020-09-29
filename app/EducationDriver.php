<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationDriver extends Model
{
    protected $table = 'education_driver';
    protected $primaryKey = 'education_driver_id';

    public $statusEducationDriver = [
        1 => 'ประถมศึกษา',
        2 => 'มัธยมศึกษา',
        3 => 'อาชีวศึกษา',
        4 => 'ปริญญาตรี',
        5 => 'ปริญญาโท',
        6 => 'อื่นๆ',
    ];
}
