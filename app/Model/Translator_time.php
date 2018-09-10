<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Translator_time extends Model
{
  protected $table='translator_times';

  public function translator()
  {
    return $this->belongsTo('App\Translator','translators_id');
  }

}
