<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mtb_translator_ikus extends Model
{
    //

    protected $table = "mtb_translator_ikus";

    public function translator_and_ikus(){

        return $this->hasMany('App\Model\Translator_and_ikus','ikus_id');

    }

    public function translators(){

        return return $this->belongsToMany('App\Model\translators','translator_and_ikus','translators_id','ikus_id');

    }



}
