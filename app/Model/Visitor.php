<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Visitor extends Authenticatable
{
    protected $table = "visitors";

    public function reservations()
    {
        return $this->hasMany('App\Model\Reservation','visitor_id','id');
    }
}
