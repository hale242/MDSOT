<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationPreApprove extends Model
{
    protected $table = 'quotation_pre_approve';
    protected $primaryKey = 'quotation_pre_approve_id';

    public function Quotation(){
        return $this->hasOne('App\Quotation', 'quotation_id', 'quotation_id')->where('quotation_status','5');
    }

    public function AdminUser(){
        return $this->hasOne('App\AdminUser', 'admin_id', 'admin_id');
    }

}
