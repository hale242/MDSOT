<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleManager extends Model
{
    protected $table = 'sale_team_main';
    protected $primaryKey = 'sale_team_main_id';

    public function SaleTeamSubHasAdminUser(){
        return $this->hasMany('\App\SaleTeamSubHasAdminUser', 'sale_team_main_id', 'sale_team_main_id');
    }
}
