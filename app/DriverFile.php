<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverFile extends Model
{
    protected $table = 'driver_file';
    protected $primaryKey = 'driver_file_id';

    public function TypeDocumentDriver(){
        return $this->hasOne('\App\TypeDocumentDriver', 'type_doc_driver_id', 'type_doc_driver_id');
    }
}
