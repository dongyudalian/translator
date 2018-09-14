<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    public function index(Request $request)
    {
    	if($request->isMethod("get")) {
	    	if(Auth::check()){
	    		$user = Auth::user();
	    	 
	    	$reservations = DB::table('reservations')->where('translator_id',$user->id)->get();	
	    	$translator = DB::table('translators')->where('id',$reservations[0]->translator_id)->first();
	    	$reservation_days = DB::table('reservation_days')->where('reservation_id',$reservations[0]->id)->get();

	    	
	    	
	    	return view("translator/reservation_index",[
	    		"reservations" => $reservations,
	    		"translator" => $translator,
	    		"reservation_days" => $reservation_days
	    	]);
    		}
    	}	
    }
}
