<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = 'quotation';
    protected $primaryKey = 'quotation_id';

    public $Status = [
        1=>'รอส่งให้ลูกค้า',
        2=>'ส่งให้ลูกค้าแล้ว รอตอบกลับ',
        3=>'ลูกค้าขอแก้เพิ่มเติม',
        4=>'ลูกค้าตอบกลับพร้อมเซ็นเอกสารแล้ว',
        5=>'ส่งอนุมัติ Pre-Approve',
        99=>'ลูกค้าไม่เอา(ยกเลิกใบเสนอราคา)',
        0=>'ยกเลิก'
    ];


    public function Company(){
        return $this->hasOne('App\Company', 'company_id', 'company_id');
    }
    public function AdminUser(){
        return $this->hasOne('App\AdminUser', 'admin_id', 'admin_id');
    }
    public function Customer(){
        return $this->hasOne('App\Customer', 'customer_id', 'customer_id');
    }
    public function QuotationPreApproveDetails(){
        return $this->hasOne('App\QuotationPreApproveDetails', 'quotation_id', 'quotation_id');
    }
    public function QuotationPreApproveLast(){
        return $this->hasOne('App\QuotationPreApprove', 'quotation_id', 'quotation_id')->whereIn('quotation_pre_approve_status', [0, 98])->whereNotNull('quotation_pre_approve_date_send');
    }
    public function ConfirmQuotationOnline(){
        return $this->hasMany('App\ConfirmQuotation', 'quotation_id', 'quotation_id')->where('confirm_quotation_status', 1);
    }
    public function QuotationPriceList(){
        return $this->hasMany('App\QuotationPriceList', 'quotation_id', 'quotation_id');
    }
    public function QuotationPriceListOt(){
        return $this->hasMany('App\QuotationPriceListOt', 'quotation_id', 'quotation_id');
    }
    public function QuotationPriceListMain(){
        return $this->hasMany('App\QuotationPriceList', 'quotation_id', 'quotation_id')->whereNull('main_quotation_price_list_id');
    }
    public function QuotationPriceListMainItem(){
        return $this->hasMany('App\QuotationPriceList', 'quotation_id', 'quotation_id')->where('quotation_price_list_main_item', 1);
    }
    public function BackOrderSpec(){
        return $this->hasMany('App\BackOrderSpec', 'quotation_id', 'quotation_id');
    }
    public function BackOrderSpecDriver(){
        return $this->hasMany('App\BackOrderSpec', 'quotation_id', 'quotation_id')->where('back_order_spec_status', 2);
    }


}
