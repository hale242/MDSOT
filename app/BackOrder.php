<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackOrder extends Model
{
    protected $table = 'back_order';
    protected $primaryKey = 'back_order_id';

    public function Quotation(){
        return $this->hasOne('App\Quotation', 'quotation_id', 'quotation_id'); //ผ่าน
    }

    public function BackOrderSpec(){
        return $this->hasMany('App\BackOrderSpec', 'back_order_id', 'back_order_id'); //ผ่าน
    }

}
