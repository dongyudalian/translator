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

}
