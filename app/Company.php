<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'company_id';

    public function Districts(){
        return $this->hasOne('\App\Districts', 'districts_id', 'districts_id');
    }
    public function Districts_En(){
        return $this->hasOne('\App\Districts', 'districts_id', 'en_districts_id');
    }
    public function CreditTerm(){
        return $this->hasMany('\App\CreditTerm', 'company_id', 'company_id');
    }
    public function CreditTermActive(){
        return $this->hasOne('\App\CreditTerm', 'company_id', 'company_id')->where('credit_term_status',1);
    }
    public function CreditTermAmount(){
        return $this->hasMany('\App\CreditTermAmount', 'company_id', 'company_id');
    }
    public function ContactInfo(){
        return $this->hasMany('\App\ContactInfo', 'company_id', 'company_id');
    }
    public function SaleArea(){
        return $this->hasOne('\App\SaleArea', 'sale_team_sub_id', 'sale_team_sub_id');
    }
}
