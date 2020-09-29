<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceStructureLineApprove extends Model
{
    protected $table = 'price_structure_line_approve';
    protected $primaryKey = 'price_structure_line_approve_id';

    public function Position(){
        return $this->hasOne('App\Position', 'position_id', 'position_id');
    }
}
