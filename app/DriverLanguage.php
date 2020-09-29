<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverLanguage extends Model
{
    protected $table = 'driver_language';
    protected $primaryKey = 'driver_language_id';

    public $statusLanguageSkill = [
        1 => 'พอใช้',
        2 => 'ดี',
        3 => 'ดีมาก',
    ];

    public function LanguageType(){
        return $this->hasOne('\App\LanguageType', 'language_type_id', 'language_type_id');
    }
}
