<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation_day extends Model
{
    protected $table = "reservation_days";

    public function reservation()
    {
        return $this->belongsTo('App\Model\Reservation','reservation_id');
    }
}
