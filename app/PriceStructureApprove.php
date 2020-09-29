<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceStructureApprove extends Model
{
    protected $table = 'price_structure_approve';
    protected $primaryKey = 'price_structure_approve_id';

    public $Status = [
        0=>'รอส่งอนุมัติ',
        1=>'รออนุมัติ',
        2=>'อนุมัติ',
        98=>'ส่งกลับ',
        99=>'ไม่อนุมัติ'
    ];

    public function PriceStructure(){
        return $this->hasOne('\App\PriceStructure', 'price_structure_id', 'price_structure_id');
    }
}
