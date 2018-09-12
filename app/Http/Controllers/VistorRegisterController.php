<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Model\Vistor;
use Illuminate\Support\Facades\Hash;

class VistorRegisterController extends Controller
{
  public function home()
  {
    return view('translator/homepage');
  }

  public function register(Request $request)
  {
    if($request->isMethod("get")){
      return view('translator/vistor_register');
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
        return redirect (route("post_vistor_register"))->withErrors($validator)->withInput();
      } else {
        $info = [
          "vistor_name" => $request["vistor_name"],
          "vistor_email" => $request["vistor_email"],
          "vistor_password" =>  Hash::make($request["vistor_password"]),
        ];

        $Vistor= new Vistor;
        $Vistor->vistor_name = $request["vistor_name"];
        $Translator->translator_salaries_id = $request->translater_salary_id;

        $Vistor->save();

        return redirect(route("login"))->with("message", "新規登録完了。");
      }
  }



}
