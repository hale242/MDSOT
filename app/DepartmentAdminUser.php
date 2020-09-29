<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentAdminUser extends Model
{
    protected $table = 'department_admin_user';
    protected $primaryKey = 'department_admin_user_id';

    public function Department(){
        return $this->hasOne('\App\Department', 'department_id', 'department_id');
    }
}
