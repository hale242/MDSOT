<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewManagingApprove extends Model
{
    protected $table = 'interview_managing_approve';
    protected $primaryKey = 'interview_managing_approve_id';

    public function AdminUser(){
        return $this->hasOne('\App\AdminUser', 'admin_id', 'admin_id');
    }
}
