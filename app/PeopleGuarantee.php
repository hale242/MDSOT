<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleGuarantee extends Model
{
    protected $table = 'people_guarantee';
    protected $primaryKey = 'people_guarantee_id';

    public function PeopleGuaranteeFile(){
        return $this->hasMany('\App\PeopleGuaranteeFile', 'people_guarantee_id', 'people_guarantee_id');
    }
}
