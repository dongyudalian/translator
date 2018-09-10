<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Translator_and_iku extends Model
{
  protected $table='translator_and_ikus';

  public function translator()
  {
    return $this->belongsTo('App\Translator','translators_id');
  }

  public function mtb_translator_iku()
  {
    return $this->belongsTo('App\Mtb_translator_iku','mtb_translator_ikus_id');
  }

}
