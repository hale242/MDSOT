<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationPriceList extends Model
{
    protected $table = 'quotation_price_list';
    protected $primaryKey = 'quotation_price_list_id';

    public function PriceStructure(){
        return $this->hasOne('\App\PriceStructure', 'price_structure_id', 'price_structure_id');
    }
    public function PriceStructureHasStaffExpense(){
        return $this->hasOne('\App\PriceStructureHasStaffExpense', 'price_structure_has_staff_expenses_id', 'price_structure_has_staff_expenses_id');
    }
    public function OtherExpenseHasStaffExpense(){
        return $this->hasOne('\App\OtherExpenseHasStaffExpense', 'other_expenses_has_staff_expenses_id', 'other_expenses_has_staff_expenses_id');
    }
    public function InsuranceFeeHasStaffExpense(){
        return $this->hasOne('\App\InsuranceFeeHasStaffExpense', 'insurance_fee_has_staff_expenses_id', 'insurance_fee_has_staff_expenses_id');
    }
    public function QuotationPriceListOt(){
        return $this->hasMany('\App\QuotationPriceListOt', 'quotation_price_list_id', 'quotation_price_list_id');
    }
    public function StaffCost(){
        return $this->hasOne('\App\StaffCost', 'staff_expenses_id', 'staff_expenses_id');
    }
    public function OtherExpenses(){
        return $this->hasOne('\App\OtherExpenses', 'other_expenses_id', 'other_expenses_id');
    }
    public function InsuranceFee(){
        return $this->hasOne('\App\InsuranceFee', 'insurance_fee_id', 'insurance_fee_id');
    }
    public function QuotationPriceListStaffExpense(){
        return $this->hasMany('\App\QuotationPriceList', 'main_quotation_price_list_id', 'quotation_price_list_id')->whereNotNull('price_structure_has_staff_expenses_id');
    }

}
