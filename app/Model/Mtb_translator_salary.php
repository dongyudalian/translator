<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mtb_translator_salary extends Model
{
    //
    protected $table = "mtb_translator_salaries";

    public function translators(){

        return $this->hasMany('App\Model\Translator','translator_salaries_id');

    }

    public function visitor_reservation()
    {

        return $this->hasOne('App\Model\Visitor_reservation','cost_id','id');

    }



}
