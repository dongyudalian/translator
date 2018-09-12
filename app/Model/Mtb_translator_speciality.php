<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mtb_translator_speciality extends Model
{
    //
    protected $table = "mtb_translator_specialities";

    public function translator_and_specialities(){

        return $this->hasMany('App\Model\Translator_and_speciality','specialities_id');

    }

    public function translators(){

        return $this->belongsToMany('App\Model\translator','translator_and_specialities','translators_id','specialities_id');

    }

}
