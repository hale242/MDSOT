<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherExpenses extends Model
{
    protected $table = 'other_expenses';
    protected $primaryKey = 'other_expenses_id';

    public function ItemCode(){
        return $this->hasOne('App\ItemCode', 'item_code_id', 'item_code_id');
    }
}
