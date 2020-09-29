<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationLineApprove extends Model
{
    protected $table = 'quotation_line_approve';
    protected $primaryKey = 'quotation_line_approve_id';

    public function Position(){
        return $this->hasOne('App\Position', 'position_id', 'position_id');
    }
}
