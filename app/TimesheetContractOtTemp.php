<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimesheetContractOtTemp extends Model
{
    protected $table = 'timesheet_contract_ot_temp';
    protected $primaryKey = 'timesheet_contract_ot_temp_id';

    public function PriceStructureOT(){
        return $this->hasOne('App\PriceStructureOT', 'price_structure_ot_id', 'price_structure_ot_id');
    }
}
