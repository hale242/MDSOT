<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectorUser extends Model
{
    protected $table = 'collertor';
    protected $primaryKey = 'collertor_id';

    public function AdminUser(){
        return $this->hasOne('\App\AdminUser', 'admin_id', 'admin_id');
    }
    public function CollectorGroup(){
        return $this->hasOne('\App\CollectorGroup', 'collertor_group_id', 'collertor_group_id');
    }
}
