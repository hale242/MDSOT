<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerContract extends Model
{
    protected $table = 'customer_contract';
    protected $primaryKey = 'customer_contract_id';

    public $Status = [
        0 => 'รอสร้างสัญญา',
        1 => 'รอข้อมูลพนักงานประจำสัญญา/รอสัมภาษณ์พนักงาน',
        2 => 'ส่งอนุมัติ/รออนุมัติ',
        3 => 'อนุมัติรอเริ่มงาน',
        4 => 'อนุมัติเริ่มงาน',
        9 => 'ยกเลิก'
    ];

    public function Quotation(){
        return $this->hasOne('App\Quotation', 'quotation_id', 'quotation_id');
    }
    public function Company(){
        return $this->hasOne('App\Company', 'company_id', 'company_id');
    }
    public function SaleOrder(){
        return $this->hasOne('App\SaleOrder', 'customer_contract_id', 'customer_contract_id');
    }
}
