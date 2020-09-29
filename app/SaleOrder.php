<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    protected $table = 'sale_order';
    protected $primaryKey = 'sale_order_id';

    public function CustomerContract(){
        return $this->hasOne('App\CustomerContract', 'customer_contract_id', 'customer_contract_id');
    }
    public function Company(){
        return $this->hasOne('App\Company', 'company_id', 'company_id');
    }
    public function Quotation(){
        return $this->hasOne('App\Quotation', 'quotation_id', 'quotation_id');
    }
    public function SaleOrderList(){
        return $this->hasMany('App\SaleOrder', 'sale_order_id', 'sale_order_id');
    }
    public function SaleOrderListFirst(){
        return $this->hasOne('App\SaleOrderList', 'sale_order_id', 'sale_order_id')->where('sale_order_list_status', 0)->orderBy('sale_order_list_id', 'asc');
    }
}
