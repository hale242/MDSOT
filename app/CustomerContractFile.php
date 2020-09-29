<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerContractFile extends Model
{
    protected $table = 'customer_contract_file';
    protected $primaryKey = 'customer_contract_file_id';

    public $Type = [
        1=>'สัญญาบริการ',
        2=>'สัญญาลูกค้า',
        3=>'สัญญาแนบท้าย',
        4=>'ต่ออายุสัญญา',
    ];

}
