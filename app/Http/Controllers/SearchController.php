<?php

namespace App\Http\Controllers;

use App\Model\Translator;
use App\Model\Translator_and_iku;
use App\Model\Translator_and_speciality;
use App\Model\Mtb_translator_iku;
use App\Model\Mtb_translator_speciality;
use App\Model\Translator_time;
use App\Model\Translator_salary;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	

    	$Translator_and_ikus = Translator_and_iku::query();
    	$Translator_and_specialities = Translator_and_speciality::query();
    	$Translators = Translator::query();
    	$Mtb_translator_ikus = Mtb_translator_iku::query();
    	$Mtb_translator_specialities = Mtb_translator_speciality::query();
    	$Translator_salaries = Translator_salary::query();
    	$Translator_times = Translator_time::query();

    	

    	$request_info = $request->all();
    	$search_info = array();

        $search_names = array(
        	"search_mtb_translator_ikus_id",
            "search_translator_time_begin",
            "search_translator_time_finish",
            "search_translator_salary_id",
            "search_mtb_translator_specialities_id",
            "search_translator_self",
        );	

        

        // foreach ($search_names as $search_name) {
        //     if($request_info) {
        //         if(isset($request_info[$search_name])) {
        //                 $search_info[$search_name] = $request_info[$search_name];
        //         }
        //     }
        // }
        // if(isset($search_info["search_mtb_translator_ikus_id"])) {
        //     $Translator_and_ikus->where("mtb_translator_ikus_id", "=", $search_info["search_mtb_translator_ikus_id"]);
        // }

        // if(isset($search_info["search_translator_salary_id"])) {
        //     $Translators->where("translator_salaries_id ", "=", $search_info["search_translator_salary_id"] );
        // }
        // if(isset($search_info["search_mtb_translator_specialities_id"])) {
        //     $Translator_and_specialities->where("mtb_translator_ikus_id", "=", $search_info["search_mtb_translator_specialities_id"]);
        // }

        //获取搜索时间的数组
     //    $startDate = $request->translator_time_begin;
     //    $endDate = $request->translator_time_finish;
     //    $search_dates = [];

     //    if(strtotime($startDate)>strtotime($endDate)){
     //        return $search_dates;

     //    }elseif($startDate = $endDate){
            
     //        array_push($search_dates,$startDate);
     //        return $search_dates;
     //    }else{
     //        array_push($search_dates,$startDate);
     //        $currentDate = $startDate;
     //        if($endDate != $currentDate){
     //            $nextDate = date('Y-m-d', strtotime($currentDate.' +1 days'));
     //            array_push($search_dates,$nextDate);
     //            $currentDate = $nextDate;
     //        }
    	// }
    	

    	// if(isset($Translators->translator_times->translator_time) &&  in_array($search_dates, $Translators->translator_times->translator_time)){
    	// 	$Translators->translator_times->where("translator_time", "=", $search_dates);
    	// }
                        


		//模糊搜索
      //   if(isset($search_info["search_translator_self"])) {
    		// if(isset($Mtb_translator_ikus->translator_and_ikus->translators_id)) {
      //       	$Mtb_translator_ikus->where("value", "LIKE", "%" . $search_info["		search_translator_self"] . "%");
        	
       
    		// }elseif(isset($Mtb_translator_specialities->translator_and_specialities->translators_id)){
      //       	$Mtb_translator_specialities->where("value", "LIKE", "%" . $search_info["		search_translator_self"] . "%");
        	
      //   	}elseif(isset($Translators->translator_salaries_id)){
      //       	$Translator_salaries->where("salary", "LIKE", "%" . $search_info["		search_translator_self"] . "%");
        	
      //   	}elseif(isset($Translator_times->$translator_time)) {
      //       	$Translator_times->where("translator_time", "LIKE", "%" . $search_info["		search_translator_self"] . "%");
      //   	}
      //   }

    return view("search",[
    		"Translators" => $Translators,
            "Mtb_translator_ikus" => Mtb_translator_iku::get(),
            "Mtb_translator_specialities" => Mtb_translator_speciality::get(),
            // "search_info" => $search_info
    	]);
                
           
    }

}
