<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Visitor extends Authenticatable
{
    protected $table = "visitors";

    public function visitor_reservations()
    {
        return $this->hasMany('App\Model\Visitor_reservation','visitor_id','id');
    }
}
