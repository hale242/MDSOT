<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffCost extends Model
{
    protected $table = 'staff_expenses';
    protected $primaryKey = 'staff_expenses_id';

    public function ItemCode(){
        return $this->hasOne('App\ItemCode', 'item_code_id', 'item_code_id');
    }
}
