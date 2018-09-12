<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorLoginController extends Controller
{
  public function login(Request $request)
  {
      if ($request->isMethod("get")){
          return view("translator/visitor_login");
      }else{
          return view("translator/visitor_login");
      }
  }

}
