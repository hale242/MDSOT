<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverBankAccount extends Model
{
    protected $table = 'driver_bank_account';
    protected $primaryKey = 'driver_bank_account_id';
    
    public function Driver(){
        return $this->hasOne('App\Driver', 'driver_id', 'driver_id');
    }
}
