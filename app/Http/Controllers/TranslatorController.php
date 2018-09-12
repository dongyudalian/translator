<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Model\Translator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Translator_and_stature;
use App\Model\Translator_and_iku;
use App\Model\Translator_time;
use App\Model\Translator_and_speciality;

class TranslatorController extends Controller
{
    //
    public function register(Request $request)
    {
    	if ($request->isMethod("get")){

        	return view("translator_register");

      	}else{

            $rules = [

                "translator_name" => "required|max:10",
                "translator_birthcity" => "required|max:30",
                "translator_birthday" => "required",
                "translator_sex" => "required",
                "translator_tel" => "required|numeric|digits_between:9,11",
                "translator_email" => "required|min:6|max:128|email|unique:translators,email",
                "translator_salary" => "required",
                "translator_specialities" => "required",
                "translator_statures" => "required",
                "translator_license" => "required",
                "translator_password" => "required|max:20",
                "translator_ikus" => "required",
                "translator_times" => "required",
                "translator_self" => "required",

            ];
            $errors = [

                "translator_name.required" => "名前を入力してください。",
                "translator_name.max" => ":max文字以内で入力してください。",
                "translator_birthcity.required" => "出身地を入力してください。",
                "translator_birthcity.max" => "出身地を:max文字以内で入力してください。",
                "translator_birthday.required" => "出生年月日を入力してください。",
                "translator_sex.required" => "性別を選択してください。",
                "translator_tel.required" => "電話番号を入力してください。",
                "translator_tel.numeric" => "電話番号を数字で入力してください。",
                "translator_tel.digits_between" => "電話番号を9から11文字で入力してください。",
                "translator_email.required" => "メールアドレスを入力してください",
                "translator_email.min" => "メールアドレスの長さは:min以上にしてください",
                "translator_email.max" => "メールアドレスの長さは:max以内にしてください",
                "translator_email.email" => "正しいメールアドレスを入力してください",
                "translator_email.unique" => "このメールアドレスはご利用いただけません",
                "translator_salary.required" => "通訳者料金を選択してください。",
                "translator_specialities.required" => "通訳者専門性を選択してください。",
                "translator_statures.required" => "通訳者外見を選択してください。",
                "translator_license.required" => "通訳者免許証有無を選択してください。",
                "translator_password.required" => "通訳者パースワードを入力してください。",
                "translator_password.max" => "通訳者パースワードを:max文字以内入力してください。",
                "translator_ikus.required" => "通訳者仕事場所を選択してください。",
                "translator_self.required" => "通訳者自己紹介を入力してください。",
                "translator_times.required" => "通訳者仕事時間を選択してください。",


            ];
            $validator = Validator::make($request->all(), $rules, $errors);
            if($validator->fails()) {
                return redirect(route('post_register') )->withErrors($validator)->withInput();
            }else{
    			$Translator= new Translator;
                $Translator->name = $request["translator_name"];
                $Translator->email = $request["translator_email"];
                $Translator->password = Hash::make($request["translator_password"]);
                $Translator->tel = $request["translator_tel"];
                $Translator->city = $request["translator_birthcity"];
                $Translator->birthday = $request["translator_birthday"];
                $Translator->sex = $request["translator_sex"];
                $Translator->license = $request["translator_license"];
                $Translator->translator_self = $request["translator_self"];
                $Translator->translator_salaries_id = $request["translator_salary"];
                $Translator->save();


                $translator_statures = $request->input("translator_statures");
                foreach ($translator_statures as $translator_stature)
                {
                    $Translator_and_stature = new Translator_and_stature;
                    $Translator_and_stature->translators_id = $Translator->id;
                    $Translator_and_stature->statures_id = $translator_stature;
                    $Translator_and_stature->save();
                }



                $translator_ikus = $request->input("translator_ikus");
                foreach ($translator_ikus as $translator_iku)
                {
                    $Translator_and_iku = new Translator_and_iku;
                    $Translator_and_iku->translators_id = $Translator->id;
                    $Translator_and_iku->ikus_id = $translator_iku;
                    $Translator_and_iku->save();
                }




                $translator_times = $request->input("translator_times");
                foreach ($translator_times as $translator_time)
                {
                    $Translator_time = new Translator_time;
                    $Translator_time->translators_id = $Translator->id;
                    $Translator_time->translator_time = $translator_time;
                    $Translator_time->save();
                }

                $Translator_specialities = $request->input("translator_specialities");
                foreach ($Translator_specialities as $Translator_speciality)
                {
                    $Translator_and_speciality = new Translator_and_speciality;
                    $Translator_and_speciality->translators_id = $Translator->id;
                    $Translator_and_speciality->specialities_id = $Translator_speciality;
                    $Translator_and_speciality->save();
                }

          		return redirect(route("get_login"))->with("message", "新規登録完了。");
            }
        }
    }

    public function login(Request $request)
    {
        if ($request->isMethod("get")){
            return view("translator_login");
        }else{
            $email = $request->email;
    		$password = $request->password;
    		if(Auth::attempt(['email' => $email, 'password' => $password]))
            {
    			return redirect(route("homepage"))->with("message", "登録しました。");
    		}
            else
            {
    			$message = 'ログインに失敗した。';
    		}
    		return view ("translator_login",['message'=>$message]);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route("homepage"))->with("message", "ログアウトしました。");
    }






}
