<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Model\Translator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Translator_salary;

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
                "translator_speciality" => "required",
                "translator_stature" => "required",
                "translator_license" => "required",
                "translator_password" => "required|max:20",
                "translator_iku" => "required",
                "translator_time" => "required",
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
                "translator_speciality.required" => "通訳者専門性を選択してください。",
                "translator_stature.required" => "通訳者外見を選択してください。",
                "translator_license.required" => "通訳者免許証有無を選択してください。",
                "translator_password.required" => "通訳者パースワードを入力してください。",
                "translator_password.max" => "通訳者パースワードを:max文字以内入力してください。",
                "translator_iku.required" => "通訳者仕事場所を選択してください。",
                "translator_self.required" => "通訳者自己紹介を入力してください。",
                "translator_time.required" => "通訳者仕事時間を選択してください。",


            ];
            $validator = Validator::make($request->all(), $rules, $errors);
            if($validator->fails()) {
                return redirect(route('post_register') )->withErrors($validator)->withInput();
            }else{
          		$info = [
    		    	"translator_name" => $request["translator_name"],
    		    	"translator_birthcity" => $request["translator_birthcity"],
                    "translator_birthday" => $request["translator_birthday"],
                    "translator_sex" => $request["translator_sex"],
                    "translator_tel" => $request["translator_tel"],
                    "translator_email" => $request["translator_email"],
                    "translator_license" => $request["translator_license"],
                    "translator_salary" => $request["translator_salary"],
    		    	"translator_password"=>  Hash::make($request['translator_password']),
    	    	];
    			$Translator= new Translator;
                $Translator->translator_name = $request["translator_name"];

                $Translator->translator_salaries_id = $request->translater_salary_id;



                $Translator->save();


                Translator::save_Translator($info,$Translator);

                $translator_salaries_id = Translator->translator_salaries_id;
                $info2 = [
                    "translator_salary" => $request["translator_salary"],
                ];
                Translator_salary::insert($info2);

                $info3 = [
                    "translator_speciality" => $request["translator_speciality"],
                ];
                Translator_speciality::insert($info3);

          		return redirect(route("login"))->with("message", "新規登録完了。");
            }
        }
    }
}
