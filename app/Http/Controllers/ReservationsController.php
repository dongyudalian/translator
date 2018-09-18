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
    	if(Auth::check()){
    		$user = Auth::user();

    		if($request->isMethod("get")) {
	    	 
		    	$reservations = DB::table('reservations')->where('translator_id',$user->id)->get();	
		    	if(isset($reservations[0])){
		    		$translator = DB::table('translators')->where('id',$reservations[0]->translator_id)->first();
		    		$reservation_days = DB::table('reservation_days')->where('reservation_id',$reservations[0]->id)->get();

		    		return view("translator/reservation_index",[
			    		"reservations" => $reservations,
			    		"translator" => $translator,
			    		"reservation_days" => $reservation_days
			    	]);
		    	}else{
		    		return redirect(route("visitor_homepage"))->with("message", "予約が見つからなかった。");
				}
		    	
    		}else{
				
    			$reservations = DB::table('reservations')->where('id',$request->id)->get();
				foreach ($reservations as $reservation) {
					
					if($reservation->status_id == 1){
						if($request->getid){
							$request->status_id = $request->getid;
						}
					}
					

    				$query_parameters = [
	    					"status_id" => $request->status_id,
	    					"id" => $request->id
    				];
				
    				
	    			DB::update('update reservations set  status_id =:status_id where id =:id', $query_parameters);
	    				
		    		return redirect(route('get_reservation'));
	    			
    			}
    			
    		}	
    	}
    }
}
