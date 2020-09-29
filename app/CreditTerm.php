<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditTerm extends Model
{
    protected $table = 'credit_term';
    protected $primaryKey = 'credit_term_id';

    public function CreditTermAmount(){
        return $this->hasMany('\App\CreditTermAmount', 'company_id', 'company_id');
    }
}
