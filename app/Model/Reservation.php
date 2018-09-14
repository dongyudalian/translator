<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservations";

    public function translator()
    {
        return $this->belongsTo('App\Model\Translator','reservation_translator_id');
    }
    public function visitor()
    {
        return $this->belongsTo('App\Model\Visitor','reservation_visitor_id');
    }
    public function reservation_days()
    {
        return $this->hasmany('App\Model\Reservation_day','reservation_id','id');
    }
}
