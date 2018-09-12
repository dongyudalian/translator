<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mtb_translator_stature extends Model
{
    //

    protected $table = "mtb_translator_statures";

    public function translator_and_statures(){

        return $this->hasMany('App\Model\Translator_and_stature','statures_id');

    }

    public function translators(){

        return $this->belongsToMany('App\Model\translator','translator_and_statures','translators_id','statures_id');

    }


}
