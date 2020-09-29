<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $primaryKey = 'department_id';

    public function PermissionActionByGroup(){
        return $this->hasMany('App\PermissionActionByGroup', 'department_id', 'department_id');
    }
}
