<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleArea extends Model
{
    protected $table = 'sale_team_sub';
    protected $primaryKey = 'sale_team_sub_id';

    public function SaleManager(){
        return $this->hasMany('\App\SaleManager', 'sale_team_main_id', 'sale_team_main_id');
    }
    public function SaleTeamSubHasAdminUser(){
        return $this->hasMany('\App\SaleTeamSubHasAdminUser', 'sale_team_sub_id', 'sale_team_sub_id');
    }
}
