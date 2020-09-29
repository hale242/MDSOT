<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleGuaranteeFile extends Model
{
    protected $table = 'people_guarantee_file';
    protected $primaryKey = 'people_guarantee_file_id';

    public function TypeDocumentDriver(){
        return $this->hasOne('App\TypeDocumentDriver', 'type_doc_driver_id', 'type_doc_driver_id');
    }
}
