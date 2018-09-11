<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TouristRegisterController extends Controller
{
  public function home()
  {
    return view('translator/homepage');
  }

  public function register()
  {
    return view('translator/touristregister');
  }

  public function add(Request $request)
  {
    if($request->isMethod("get")){
      return view('translator/homepage');
    } else {

      $validation_rules = [
        "name" => "required",
        "email" => "required",
        "password" => "required",
      ];

      $validation_error_messages = [
        "name.required" => "正しい名前を入力してください。",
        "email.required" => "正しいメールアドレスを入力してください。",
        "password.required" => "正しいパスワードを入力してください。",
      ];
    }

    $validator = Validator::make($request->all(),$validation_rules,$validation_error_messages);
      if ($validator->fails()){
        return redirect (route("get_register"))->withErrors($validator)->withInput();
      }
  }

  

}
