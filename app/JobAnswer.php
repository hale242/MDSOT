<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAnswer extends Model
{
    protected $table = 'job_answer';
    protected $primaryKey = 'job_answer_id';

    public function JobQuestion(){
        return $this->hasOne('\App\JobQuestion', 'job_question_id', 'job_question_id');
    }
}
