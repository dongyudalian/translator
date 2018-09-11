<?php

namespace App\Model\Visitor_reservation;

use Illuminate\Database\Eloquent\Model;

class Visitor_reservation extends Model
{
    public function translator()
    {
        return $this->belongsTo('App\Model\Translator','visitor_reservation_translator_id');
    }
    public function mtb_translator_salary()
    {
        return $this->belongsTo('App\Model\Mtb_translator_salary','visitor_reservation_cost_id');
    }
    public function visitor()
    {
        return $this->belongsTo('App\Model\Visitor','visitor_reservation_visitor_id');
    }
    public function reservation_days()
    {
        return $this->hasmany('App\Model\Reservation_day','reservation_id','id');
    }

}
