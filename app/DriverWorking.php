<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverWorking extends Model
{
    protected $table = 'driver_working';
    protected $primaryKey = 'driver_working_id';

    public $Status = [
        1=>'Standby',
        2=>'Substitute',
        3=>'In Contract'
    ];

    public function Driver(){
        return $this->hasOne('App\Driver', 'driver_id', 'driver_id');
    }
    public function DriverOle(){
        return $this->hasOne('App\Driver', 'driver_id', 'ole_driver_id');
    }
    public function CompanyNew(){
        return $this->hasOne('App\Company', 'company_id', 'new_company_id');
    }
    public function CompanyOle(){
        return $this->hasOne('App\Company', 'company_id', 'ole_company_id');
    }
    public function CustomerContractNew(){
        return $this->hasOne('App\CustomerContract', 'customer_contract_id', 'customer_contract_id');
    }
    public function CustomerContractOle(){
        return $this->hasOne('App\CustomerContract', 'customer_contract_id', 'ole_customer_contract_id');
    }
    public function QuotationPriceList(){
        return $this->hasOne('App\QuotationPriceList', 'quotation_price_list_id', 'quotation_price_list_id');
    }
    public function Quotation(){
        return $this->hasOne('App\Quotation', 'quotation_id', 'quotation_id');
    }
    public function BackOrderSpec(){
        return $this->hasOne('App\BackOrderSpec', 'back_order_spec_id', 'back_order_spec_id');
    }
    public function TimesheetContractDriver(){
        return $this->hasMany('App\TimesheetContractDriver', 'driver_working_id', 'driver_working_id');
    }
}
