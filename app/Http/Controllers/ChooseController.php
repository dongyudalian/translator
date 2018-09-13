<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChooseController extends Controller
{
    //
    public function time(Request $request)
    {
    	if ($request->isMethod("get")){

            return view ("choose_time");

        }
    }
}
