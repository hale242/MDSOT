<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brethren extends Model
{
    protected $table = 'brethren';
    protected $primaryKey = 'brethren_id';

    public $statusRealtionship = [
        1 => 'พี่',
        2 => 'น้อง'
    ];
}
