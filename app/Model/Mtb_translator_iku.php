<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mtb_translator_iku extends Model
{
    //

    protected $table = "mtb_translator_ikus";

    public function translator_and_ikus(){

        return $this->hasMany('App\Model\Translator_and_iku','ikus_id');

    }

    public function translators(){

        return $this->belongsToMany('App\Model\translator','translator_and_ikus','translators_id','ikus_id');

    }



}
