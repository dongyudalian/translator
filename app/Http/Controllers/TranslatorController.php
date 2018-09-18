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
use App\Model\Mtb_translator_salary;
use App\Model\Mtb_translator_speciality;
use App\Model\Mtb_translator_stature;
use App\Model\Mtb_translator_iku;

class TranslatorController extends Controller
{
    //
    public function register(Request $request)
    {
    	if ($request->isMethod("get")){

            $aas = Mtb_translator_salary::all();
            $bbs = Mtb_translator_speciality::all();
            $ccs = Mtb_translator_stature::all();
            $dds = Mtb_translator_iku::all();


            $time = getdate();
            $mday = $time["mday"]; //今天是当月第几天
            $mon = $time["mon"]; // 今天是那个月
            $year = $time["year"];// 现在是那一年

            //得到今天这个月一共多少天
            if($mon==4||$mon==6||$mon==9||$mon==11){
                $day = 30;
            }elseif($mon==2){
                if(($year%4==0&&$year%100!=0)||$year%400==0){
                    $day = 29;
                }else{
                    $day = 28;
                }
            }else{
                $day = 31;
            }
            //得到当月第一天是周几
            $w = getdate(mktime(0,0,0,$mon,1,$year))["wday"];

            //把这个月所有的日期放进这个变量中
            $arr = array();
            for($i=1;$i<=$day;$i++){
                array_push($arr,$i);
            }

            //这个月的第一天是星期几开始写入这个月所有日期的值
            if($w>=1&&$w<=6){
                for($m=1;$m<=$w;$m++){
                    array_unshift($arr,"");
                }
            }
            $n=0;

            if($mon==1||$mon==2||$mon==3||$mon==4||$mon==5||$mon==6||$mon==7||$mon==8||$mon==9){
                $mon="0".$mon;
            }
            else {
                $mon = $mon;
            }

            $time1 = getdate();
            $mday1 = $time["mday"]; //今天是当月第几天
            $mon1 = $time["mon"]+1; // 今天是那个月
            $year1 = $time["year"];// 现在是那一年

            //得到今天这个月一共多少天
            if($mon1==4||$mon1==6||$mon1==9||$mon1==11){
                $day1 = 30;
            }elseif($mon1==2){
                if(($year1%4==0&&$year1%100!=0)||$year1%400==0){
                    $day1 = 29;
                }else{
                    $day1 = 28;
                }
            }else{
                $day1 = 31;
            }
            //得到当月第一天是周几
            $w1 = getdate(mktime(0,0,0,$mon1,1,$year1))["wday"];

            //把这个月所有的日期放进这个变量中
            $arr1 = array();
            for($i=1;$i<=$day1;$i++){
                array_push($arr1,$i);
            }

            //这个月的第一天是星期几开始写入这个月所有日期的值
            if($w1>=1&&$w1<=6){
                for($m=1;$m<=$w1;$m++){
                    array_unshift($arr1,"");
                }
            }
            $n1=0;

            if($mon1==1||$mon1==2||$mon1==3||$mon1==4||$mon1==5||$mon1==6||$mon1==7||$mon1==8||$mon1==9){
                $mon1="0".$mon1;
            }
            else {
                $mon1 = $mon1;
            }

            $time2 = getdate();
            $mday2 = $time["mday"]; //今天是当月第几天
            $mon2 = $time["mon"]+2; // 今天是那个月
            $year2 = $time["year"];// 现在是那一年

            //得到今天这个月一共多少天
            if($mon2==4||$mon2==6||$mon2==9||$mon2==11){
                $day2 = 30;
            }elseif($mon2==2){
                if(($year2%4==0&&$year2%100!=0)||$year2%400==0){
                    $day2 = 29;
                }else{
                    $day2 = 28;
                }
            }else{
                $day2 = 31;
            }
            //得到当月第一天是周几
            $w2 = getdate(mktime(0,0,0,$mon2,1,$year2))["wday"];

            //把这个月所有的日期放进这个变量中
            $arr2 = array();
            for($i=1;$i<=$day2;$i++){
                array_push($arr2,$i);
            }

            //这个月的第一天是星期几开始写入这个月所有日期的值
            if($w2>=1&&$w2<=6){
                for($m=1;$m<=$w2;$m++){
                    array_unshift($arr2,"");
                }
            }
            $n2=0;

            if($mon2==1||$mon2==2||$mon2==3||$mon2==4||$mon2==5||$mon2==6||$mon2==7||$mon2==8||$mon2==9){
                $mon2="0".$mon2;
            }
            else {
                $mon2 = $mon2;
            }

        	return view("/translator/translator_register",[
    		    'aas'=>$aas,
                'bbs'=>$bbs,
                'ccs'=>$ccs,
                'dds'=>$dds,
                'time'=>$time,
                'mday'=>$mday,
                'mon'=>$mon,
                'year'=>$year,
                'day'=>$day,
                'w'=>$w,
                'arr'=>$arr,
                'n'=>$n,
                'time1'=>$time1,
                'mday1'=>$mday1,
                'mon1'=>$mon1,
                'year1'=>$year1,
                'day1'=>$day1,
                'w1'=>$w1,
                'arr1'=>$arr1,
                'n1'=>$n1,
                'time2'=>$time2,
                'mday2'=>$mday2,
                'mon2'=>$mon2,
                'year2'=>$year2,
                'day2'=>$day2,
                'w2'=>$w2,
                'arr2'=>$arr2,
                'n2'=>$n2,
    		]);

      	}else{

            $rules = [

                "translator_name" => "required|max:10",
                "translator_birthcity" => "required|max:30",
                "translator_birthday" => "required",
                "translator_sex" => "required",
                "translator_tel" => "required|numeric|digits_between:9,11",
                "translator_email" => "required|min:6|max:128|email|unique:translators,email",
                "mtb_translator_salaries" => "required",
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
                "mtb_translator_salaries.required" => "通訳者料金を選択してください。",
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
            return view("/translator/translator_login");
        }else{
            $email = $request->email;
    		$password = $request->password;
    		if(Auth::attempt(['email' => $email, 'password' => $password]))
            {
    			return redirect(route("visitor_homepage"))->with("message", "登録しました。");
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
        return redirect(route("visitor_homepage"))->with("message", "ログアウトしました。");
    }

}
