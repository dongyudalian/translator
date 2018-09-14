<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index(Request $request)
    {
    	return view("translator/reservation_index");
    }
}
