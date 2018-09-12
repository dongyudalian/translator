<?php

namespace App\Model\Visitor;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = "visitors";
    
    public function visitor_reservations()
    {

        return $this->hasMany('App\Model\Visitor_reservation','visitor_id','id');
    }
}
