<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Translator_and_speciality extends Model
{
  protected $table='translator_and_specialities';

  public function translator()
  {
    return $this->belongsTo('App\Model\Translator','translators_id');
  }

  public function mtb_translator_speciality()
  {
    return $this->belongsTo('App\Model\Mtb_translator_speciality','mtb_translator_specialities_id');
  }

}
