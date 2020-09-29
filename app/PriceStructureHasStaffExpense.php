<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceStructureHasStaffExpense extends Model
{
    protected $table = 'price_structure_has_staff_expenses';
    protected $primaryKey = 'price_structure_has_staff_expenses_id';

    public $Status = [
         0=>'แก้ไขไม่ได้',
         1=>'แก้ไขได้',
         2=>'แก้ไขได้แต่ต้องไม่ต่ำกว่าที่เป็นอยู่',
         3=>'แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด'
    ];

    public $ExpenseType = [
         0=>'รายวัน',
         1=>'รายเดือน',
    ];

    public $Cost = [
         0=>'เรียกเก็บลูกค้า',
         1=>'ไม่เรียกเก็บลูกค้าเพราะรวมอยู่ในค่าบริการ',
    ];

    public function StaffCost(){
        return $this->hasOne('\App\StaffCost', 'staff_expenses_id', 'staff_expenses_id');
    }
}
