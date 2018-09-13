<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Visitor;
use Illuminate\Support\Facades\Hash;

class VisitorRegisterController extends Controller
{
  public function home()
  {
    return view('translator/homepage');
  }

  public function register(Request $request)
  {
    if($request->isMethod("get")){
      return view('translator/visitor_register');
    } else {

      $validation_rules = [
        "name" => "required|unique:visitors,name",
        "email" => "required|unique:visitors,email",
        "password" => "required|confirmed",
        'password_confirmation' =>"required|same:password" ,
      ];

      $validation_error_messages = [
        "name.required" => "正しい名前を入力してください。",
        'name.unique' => "この名前を存在しています。",
        "email.required" => "正しいメールアドレスを入力してください。",
        "email.unique" => "このメールアドレスをご利用頂けません。",
        "password.required" => "正しいパスワードを入力してください。",
        "password.confirmed" => "同じパスワードを再入力してください。",
        "password_confirmation.same" => "",
      ];
    }

    $validator = Validator::make($request->all(),$validation_rules,$validation_error_messages);
    if ($validator->fails()){
      return redirect (route("post_visitor_register"))->withErrors($validator)->withInput();
    } else {
      $Visitor= new Visitor;
      $Visitor->name = $request["name"];
      $Visitor->email = $request["email"];
      $Visitor->password = Hash::make($request["password"]);

      $Visitor->save();

      return redirect(route("get_visitor_login"))->with("message", "新規登録完了。");
    }
  }

}
