<?php

namespace App\Http\Controllers;

use App\Model\Reservation;
use App\Model\Reservation_day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChooseController extends Controller
{
    //
    public function time(Request $request)
    {
    	if ($request->isMethod("get")){
            $time = getdate();
            $mday = $time["mday"]; //今天是当月第几天
            $mon = $time["mon"]; // 今天是那个月
            $year = $time["year"];// 现在是那一年
            $id = $request->id;
            $translators = DB::table('translators')->where('id',$id)->get();
            $get_times = DB::table('translator_times')->where('translators_id',$translators[0]->id)->get()->toArray();
            $mtb_translator_salary = DB::table('mtb_translator_salaries')->where('id',$translators[0]->translator_salaries_id)->first();
            $reservations = DB::table('reservations')->where('translator_id',$id)->get()->toArray();
            $status_ids = array();
            foreach ($reservations as $reservation) {
                $status_ids[]=$reservation->status_id;
            }

            if($reservation->status_id ==1 ||$reservation->status_id==2 ){

                $reservation_ids = array();

                foreach ($reservations as $reservation) {
                    $reservation_ids[] = $reservation->id;
                }
                $choose_times =array();
                foreach ($reservation_ids as $reservation_id) {
                    $reservations = DB::table('reservation_days')->where('reservation_id',$reservation_id)->get();
                    foreach ($reservations as $reservation) {
                        $choose_times[] = $reservation->pickup_date;
                    }
                }
            }else{
                $choose_times = $get_times;
            }

            //得到纯时间的数组
            $work_dates = array();
            foreach ($get_times as $value) {
                $work_dates[] = $value->translator_time;
            }

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



            return view ("/translator/choose_time",
            [
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
                'work_dates'=>$work_dates,
                'mtb_translator_salary' =>$mtb_translator_salary,
                'choose_times' =>$choose_times,
            ]);

        }else {
            $id = $request->id;
            $translators = DB::table('translators')->where('id',$id)->get();
            $get_times = DB::table('translator_times')->where('translators_id',$translators[0]->id)->get()->toArray();
            $mtb_translator_salary = DB::table('mtb_translator_salaries')->where('id',$translators[0]->translator_salaries_id)->first();
            $visitor = Auth::guard("visitor")->user();
            $Restervation = new Reservation;
            $Restervation->visitor_id = $visitor->id;
            $Restervation->translator_id = $request["id"];
            $Restervation->status_id = $request["status_id"];
            $Restervation->reservation_comment = $request["reservation_comment"];
            $Restervation->cost = $mtb_translator_salary->value;

            $Restervation->save();


            $translator_times = $request->input("translator_times");

            foreach ($translator_times as $translator_time)
            {
                $Reservation_day = new Reservation_day;
                $Reservation_day->reservation_id = $Restervation->id;
                $Reservation_day->pickup_date = $translator_time;

                $Reservation_day->save();
            }

            return redirect(route("visitor_homepage"))->with("message", "予約しました");
        }
    }


    private function check_available($translator_id, $date)
    {

    }
}
