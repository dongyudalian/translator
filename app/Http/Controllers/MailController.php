<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{

    public function send(Request $request)
    {

        $reservations = DB::table('reservations')->where('status_id',"=","2")->get();


        foreach ($reservations as $reservation) {
        	$visitor = DB::table('visitors')->where('id',$reservation->visitor_id)->first();
	        $translator = DB::table('translators')->where('id',$reservation->translator_id)->first();
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
    }
}
