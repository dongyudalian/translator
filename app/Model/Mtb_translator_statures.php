<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mtb_translator_statures extends Model
{
    //

    protected $table = "mtb_translator_statures";

    public function translator_and_statures(){

        return $this->hasMany('App\Model\Translator_and_statures','statures_id');

    }

    public function translators(){

        return return $this->belongsToMany('App\Model\translators','translator_and_statures','translators_id','statures_id');

    }


}
