<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimesheetContractDriverAddOn extends Model
{
    protected $table = 'timesheet_contract_driver_add_on';
    protected $primaryKey = 'timesheet_contract_driver_add_on_id';

    public function StaffCost(){
        return $this->hasOne('App\StaffCost', 'staff_expenses_id', 'staff_expenses_id');
    }

}
