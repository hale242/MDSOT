<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceFee extends Model
{
    protected $table = 'insurance_fee';
    protected $primaryKey = 'insurance_fee_id';

    public function ItemCode(){
        return $this->hasOne('App\ItemCode', 'item_code_id', 'item_code_id');
    }
}
