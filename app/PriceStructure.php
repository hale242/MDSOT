<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceStructure extends Model
{
    protected $table = 'price_structure';
    protected $primaryKey = 'price_structure_id';

    public $ApproveStatus = [
        0=>'ยังไม่ส่งอนุมัติ',
        1=>'ส่งอนุมัติ',
        2=>'อนุมัติ',
        3=>'ส่งกลับแก้ไข',
        99=>'ไม่อนุมัติ'
    ];

    public function ItemCode(){
        return $this->hasOne('App\ItemCode', 'item_code_id', 'item_code_id');
    }
    public function PriceStructureOtHasPriceStructure(){
        return $this->hasMany('\App\PriceStructureOtHasPriceStructure', 'price_structure_id', 'price_structure_id');
    }
    public function PriceStructureHasStaffExpense(){
        return $this->hasMany('\App\PriceStructureHasStaffExpense', 'price_structure_id', 'price_structure_id');
    }
    public function OtherExpenseHasStaffExpense(){
        return $this->hasMany('\App\OtherExpenseHasStaffExpense', 'price_structure_id', 'price_structure_id');
    }
    public function InsuranceFeeHasStaffExpense(){
        return $this->hasMany('\App\InsuranceFeeHasStaffExpense', 'price_structure_id', 'price_structure_id');
    }
    public function PriceStructureApprove(){
        return $this->hasMany('\App\PriceStructureApprove', 'price_structure_id', 'price_structure_id');
    }
}
