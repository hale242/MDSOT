<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrderList extends Model
{
    protected $table = 'sale_order_list';
    protected $primaryKey = 'sale_order_list_id';

    public function SaleOrder(){
        return $this->hasOne('App\SaleOrder', 'sale_order_id', 'sale_order_id');
    }

}
