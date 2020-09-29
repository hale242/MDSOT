<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCode extends Model
{
    protected $table = 'item_code';
    protected $primaryKey = 'item_code_id';

    public function AccountCodeRevenue(){
        return $this->hasOne('App\AccountCode', 'account_code_id', 'revenue_account_code_id');
    }
    public function AccountCodePay(){
        return $this->hasOne('App\AccountCode', 'account_code_id', 'pay_account_code_id');
    }

}
