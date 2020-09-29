<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackOrderSpec extends Model
{
    protected $table = 'back_order_spec';
    protected $primaryKey = 'back_order_spec_id';

    public function BackOrderInterviewPass(){
        return $this->hasOne('App\BackOrderInterview', 'back_order_spec_id', 'back_order_spec_id')->where('back_order_interviwe_results', 1); //ผ่าน
    }
    public function Districts(){
        return $this->hasOne('App\Districts', 'districts_id', 'districts_id');
    }
    public function QuotationPriceList(){
        return $this->hasOne('App\QuotationPriceList', 'quotation_price_list_id', 'quotation_price_list_id');
    }
    public function DriverWorking(){
        return $this->hasOne('App\DriverWorking', 'back_order_spec_id', 'back_order_spec_id')->where('driver_working_status', 1)->orderBy('driver_working_id', 'desc');
    }
    public function DriverWorkingAll(){
        return $this->hasMany('App\DriverWorking', 'back_order_spec_id', 'back_order_spec_id');
    }
}
