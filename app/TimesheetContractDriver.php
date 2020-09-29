<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimesheetContractDriver extends Model
{
    protected $table = 'timesheet_contract_driver';
    protected $primaryKey = 'timesheet_contract_driver_id';

    public $Color = [
        'Sun'=>'#F44336',
        'Mon'=>'#FFEB3B',
        'Tue'=>'#d8349e',
        'Wed'=>'#4CAF50',
        'Thu'=>'#FF9800',
        'Fri'=>'#03A9F4',
        'Sat'=>'#9C27B0'
    ];

    public function TimesheetContract(){
        return $this->hasOne('App\TimesheetContract', 'timesheet_contract_id', 'timesheet_contract_id');
    }
    public function TimesheetContractDriverAddOn(){
        return $this->hasMany('App\TimesheetContractDriverAddOn', 'timesheet_contract_driver_id', 'timesheet_contract_driver_id');
    }
}
