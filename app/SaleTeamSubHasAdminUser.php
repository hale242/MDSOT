<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleTeamSubHasAdminUser extends Model
{
    protected $table = 'sale_team_sub_has_admin_user';
    protected $primaryKey = 'sale_team_sub_has_admin_user_id';

    public function AdminUser(){
        return $this->hasMany('\App\AdminUser', 'admin_id', 'admin_id');
    }

    public function SaleManager(){
        return $this->hasMany('\App\SaleArea', 'sale_team_main_id', 'sale_team_main_id');
    }
    
    public function SaleArea(){
        return $this->hasMany('\App\SaleArea', 'sale_team_sub_id', 'sale_team_sub_id');
    }
    
}
