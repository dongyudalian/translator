<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{

    public function home (Request $request)
    {
        $user = null;
        if(Auth::check()) {
            $user = Auth::user();
        }
        if(Auth::guard("visitor")->check()) {
            $user = Auth::guard("visitor")->user();
        }

        return view("/translator/homepage",
        [
            'user'=>$user,
        ]);
    }

}
