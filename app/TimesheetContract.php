<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimesheetContract extends Model
{
    protected $table = 'timesheet_contract';
    protected $primaryKey = 'timesheet_contract_id';

    public $Color = [
        'Sun'=>'#F44336',
        'Mon'=>'#FFEB3B',
        'Tue'=>'#d8349e',
        'Wed'=>'#4CAF50',
        'Thu'=>'#FF9800',
        'Fri'=>'#03A9F4',
        'Sat'=>'#9C27B0'
    ];
}
