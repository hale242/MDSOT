<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceFeeHasStaffExpense extends Model
{
    protected $table = 'insurance_fee_has_staff_expenses';
    protected $primaryKey = 'insurance_fee_has_staff_expenses_id';

    public $Type = [
        0=>'คิดตามจำนวนตายตัว',
        1=>'คิดตาม % ของเงินเดือน',
        2=>'คิดตาม % ของเงินเดือนแต่มีค่าสูงสุด',
        3=>'คิดตาม % ของเงินเดือนแต่มีค่าขั้นต่ำ',
        4=>'คิดตาม % ของจำนวนที่กำหนด',
        5=>'คิด % จากราคาขายทั้งหมด',
        6=>'คิด % จากราคาต้นทุนทั้งหมด'
    ];

    public $Status = [
         0=>'แก้ไขไม่ได้',
         1=>'แก้ไขได้',
         2=>'แก้ไขได้แต่ต้องไม่ต่ำกว่าที่เป็นอยู่',
         3=>'แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด'
    ];

    public $CostStatus = [
         0=>'ไม่รวมต้นทุน',
         1=>'นำไปคิดรวมต้นทุน'
    ];

    public function InsuranceFee(){
        return $this->hasOne('App\InsuranceFee', 'insurance_fee_id', 'insurance_fee_id');
    }
}
