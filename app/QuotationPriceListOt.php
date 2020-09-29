<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationPriceListOt extends Model
{
    protected $table = 'quotation_price_list_ot';
    protected $primaryKey = 'quotation_price_list_ot_id';

    public function PriceStructureOT(){
        return $this->hasOne('\App\PriceStructureOT', 'price_structure_ot_id', 'price_structure_ot_id');
    }


}
