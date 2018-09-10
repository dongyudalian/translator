<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mtb_translator_specialities extends Model
{
    //
    protected $table = "mtb_translator_specialities";

    public function translator_and_specialities(){

        return $this->hasMany('App\Model\Translator_and_specialities','specialities_id');

    }

    public function translators(){

        return return $this->belongsToMany('App\Model\translators','translator_and_specialities','translators_id','specialities_id');

    }

}
