<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Translator_and_stature extends Model
{
  protected $table='translator_and_statures';

  public function translator()
  {
    return $this->belongsTo('App\Translator','translators_id');
  }

  public function mtb_translator_stature()
  {
    return $this->belongsTo('App\Mtb_translator_stature','mtb_translator_statures_id');
  }

}
