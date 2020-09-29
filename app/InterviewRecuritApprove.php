<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewRecuritApprove extends Model
{
    protected $table = 'interview_recurit_approve';
    protected $primaryKey = 'interview_recurit_approve_id';

    public function AdminUser(){
        return $this->hasOne('\App\AdminUser', 'admin_id', 'admin_id');
    }
}
