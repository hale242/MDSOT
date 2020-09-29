<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';

    public function Districts(){
        return $this->hasOne('\App\Districts', 'districts_id', 'districts_id');
    }
    
    public function Company(){
        return $this->hasMany('\App\Company', 'company_id', 'company_id');
    }
}
