<?php

namespace App\Model\Reservation_day;

use Illuminate\Database\Eloquent\Model;

class Reservation_day extends Model
{
    protected $table = "reservation_days";

    public function visitor_reservation()
    {
        return $this->belongsTo('App\Model\Visitor_reservation','visitor_reservation_id');
    }
}
