<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{

    public function home (Request $request)
    {
        $user = Auth::guard("visitor")->user();
        return view("/translator/homepage",
        [
            'user'=>$user,
        ]);
    }

    public function translator_home (Request $request)
    {
        $user = Auth::user();
        return view("/translator/homepage",
        [
            'user'=>$user,
        ]);
    }

}
