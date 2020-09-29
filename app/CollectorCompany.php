<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectorCompany extends Model
{
    protected $table = 'collertor_company';
    protected $primaryKey = 'collertor_company_id';

    public function AdminUser()
    {
        return $this->hasOne('\App\AdminUser', 'admin_id', 'admin_id');
    }
    public function CollectorGroup()
    {
        return $this->hasOne('\App\CollectorGroup', 'collertor_group_id', 'collertor_group_id');
    }
}
