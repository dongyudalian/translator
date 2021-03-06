<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Scheduling\Schedule;
use Mail;

class ReservationsController extends Controller
{
    public function index(Request $request)
    {
    	if(Auth::check()){
    		$user = Auth::user();

    		if($request->isMethod("get")) {

		    	$reservations = DB::table('reservations')->where('translator_id',$user->id)->get();
                $visitors = null;
                $reservation_days = null;

		    	if($reservations != null ){
                    foreach ($reservations as $reservation) {
                        $visitors[] = DB::table('visitors')->where('id',$reservation->visitor_id)->get();
                        $reservation_days[] = DB::table('reservation_days')->where('reservation_id',$reservation->id)->get();
                    }

		    		return view("translator/reservation_index",[
			    		"reservations" => $reservations,
			    		"visitors" => $visitors,
			    		"reservation_days" => $reservation_days
			    	]);
		    	}else{
		    		return redirect(route("visitor_homepage"))->with("message", "予約が見つからなかった。");
				}

    		}
		}
	}
		public function edit(Request $request,$id,$status_id)
        {

			//予約済みの場合、id値を変える
			if($request->isMethod("get")) {

    			$id = $request->id;
    			$status_id = $request->status_id;
    			$reservation = DB::table('reservations')->where('id',$id)->first();

				if($reservation->status_id == 1){

					$request->status_id = $request->status_id;
				}


				$query_parameters = [
    					"status_id" => $request->status_id,
    					"id" => $request->id
				];


    			DB::update('update reservations set  status_id =:status_id where id =:id', $query_parameters);


    			//メールの発信機能
    			$mail_reservation = DB::table('reservations')->where('id',$id)->first();


    			if($mail_reservation->status_id == 2){

		        	$visitor = DB::table('visitors')->where('id',$mail_reservation->visitor_id)->first();
			        $translator = DB::table('translators')->where('id',$mail_reservation->translator_id)->first();
		        	$visitor_email = $visitor->email;
		        	$visitor_name = $visitor->name;
		        	$translator_email = $translator->email;
		        	$translator_name = $translator->name;

					Mail::send('emails.visitor', ['visitor_email' => $visitor_email,'visitor_name' => $visitor_name], function ($m) use ($visitor_email,$visitor_name) {
			            $m->from('syourai1015@gmail.com', 'Your Application');
			            $m->to($visitor_email)->subject('予約を受け取りました!');

		        	});

		        	Mail::send('emails.translator', ['translator_email' => $translator_email,'translator_name' => $translator_name], function ($m) use ($translator_email,$translator_name) {
			            $m->from('syourai1015@gmail.com', 'Your Application');
			            $m->to($translator_email)->subject('予約されました!');

		        	});

			    }

    		return redirect(route('get_reservation'))->with("message", "予約取りました。");

    		}
    	}
}
