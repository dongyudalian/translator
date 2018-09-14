<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorLoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod("get")){
            return view("translator/visitor_login");
        } else {
            $email = $request->email;
            $password = $request->password;
            if(Auth::guard("visitor")->attempt(['email' => $email, 'password' => $password]))
            {
                return redirect(route('visitor_homepage'))->with("message", "登録しました。");
            } else {
                $message = 'ログインに失敗した';
            }
            return view ("translator/visitor_login",['message'=>$message]);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard("visitor")->logout();
        return redirect(route("visitor_homepage"))->with("message", "ログアウトしました。");
    }
}
