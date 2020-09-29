<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitmentPosition extends Model
{
    protected $table = 'recruitment_position';
    protected $primaryKey = 'recruitment_position_id';

    public function Driver(){
        return $this->hasMany('App\Driver', 'recruitment_position_id', 'recruitment_position_id');
    }
}
