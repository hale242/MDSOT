<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherExpenseHasStaffExpense extends Model
{
    protected $table = 'other_expenses_has_staff_expenses';
    protected $primaryKey = 'other_expenses_has_staff_expenses_id';

    public $Status = [
         0=>'แก้ไขไม่ได้',
         1=>'แก้ไขได้',
         2=>'แก้ไขได้แต่ต้องไม่ต่ำกว่าที่เป็นอยู่',
         3=>'แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด'
    ];

    public function OtherExpenses(){
        return $this->hasOne('App\OtherExpenses', 'other_expenses_id', 'other_expenses_id');
    }
}
