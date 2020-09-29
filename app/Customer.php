<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';

    public function Districts(){
        return $this->hasOne('\App\Districts', 'districts_id', 'districts_id');
    }
    public function Contact(){
        return $this->hasMany('\App\Contact', 'customer_id', 'customer_id');
    }
}
