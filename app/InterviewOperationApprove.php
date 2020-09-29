<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewOperationApprove extends Model
{
    protected $table = 'interview_operation_approve';
    protected $primaryKey = 'interview_operation_approve_id';

    public function AdminUser(){
        return $this->hasOne('\App\AdminUser', 'admin_id', 'admin_id');
    }
}
