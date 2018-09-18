<?php

namespace App\Http\Controllers;

use App\Model\Translator;
use App\Model\Mtb_translator_iku;
use App\Model\Mtb_translator_speciality;
use App\Model\Mtb_translator_salary;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {


    	$Translators = Translator::query();
    	$Mtb_translator_ikus = Mtb_translator_iku::query();
    	$Mtb_translator_specialities = Mtb_translator_speciality::query();
    	$Mtb_translator_salaries = Mtb_translator_salary::query();


        //requestものを配列に入れた
    	$request_info = $request->all();
    	$search_info = array();
        $search_names = array(
        	"search_mtb_translator_ikus_ids",
            "search_translator_time_begin",
            "search_translator_time_finish",
            "search_mtb_translator_salary_id",
            "search_mtb_translator_specialities_ids",
            "search_translator_self",
        );
        foreach ($search_names as $search_name) {
            if($request_info) {
                if(isset($request_info[$search_name])) {
                        $search_info[$search_name] = $request_info[$search_name];
                }
            }
        }

        //ikusの検索
        if(
        	isset($search_info["search_mtb_translator_ikus_ids"]) && is_array($search_info["search_mtb_translator_ikus_ids"]) && count($search_info["search_mtb_translator_ikus_ids"]) > 0
        ) {
        	foreach ($search_info["search_mtb_translator_ikus_ids"] as $search_mtb_translator_ikus_id
        	) {
        		$Translators->whereHas("mtb_translator_ikus", function($query) use($search_mtb_translator_ikus_id) {
        			$query->where("mtb_translator_ikus.id", $search_mtb_translator_ikus_id);
        		});
        	}
        }

        //料金の検索
        if(
        	isset($search_info["search_mtb_translator_salary_id"])) {
                $Translators->where("translator_salaries_id", "=", $search_info["search_mtb_translator_salary_id"]);
        }

        //地域の検索
        if(
        	isset($search_info["search_mtb_translator_specialities_ids"]) && is_array($search_info["search_mtb_translator_specialities_ids"]) && count($search_info["search_mtb_translator_specialities_ids"]) > 0
        ) {
        	foreach ($search_info["search_mtb_translator_specialities_ids"] as $search_mtb_translator_specialities_id
        	) {
        		$Translators->whereHas("mtb_translator_specialities", function($query) use($search_mtb_translator_specialities_id) {
        			$query->where("mtb_translator_specialities.id", $search_mtb_translator_specialities_id);
        		});
        	}
        }

        //時間の検索
        if($request->search_translator_time_begin & $request->search_translator_time_finish){
            //获取搜索时间的数组
            $startDate = $request->search_translator_time_begin;
            $endDate = $request->search_translator_time_finish;

            $starttimestamp = strtotime($startDate);
            $endtimestamp = strtotime($endDate);


    		// 计算日期段内有多少天
    	    $dates = ($endtimestamp-$starttimestamp)/86400+1;

    	    $search_dates = array();

    	    for($i=0; $i<$dates; $i++){
    	        $search_dates[] = date('Y-m-d', $starttimestamp+(86400*$i));
    	    }


        	if(
            	isset($search_dates) && is_array($search_dates) && count($search_dates) > 0
            ) {

        		$Translators->whereHas("translator_times", function($query) use($search_dates) {
        			$query->whereIn("translator_times.translator_time",$search_dates);
        		});
        	}

        }

        //模糊搜索
        if(isset($search_info["search_translator_self"])) {
        	$search_self = $search_info["search_translator_self"];

    		 $Translators->whereHas("mtb_translator_specialities", function($query) use($search_self) {
                $query->where("mtb_translator_specialities.value", "LIKE", "%" . $search_self . "%");

            })->orWhereHas("mtb_translator_ikus", function($query) use($search_self) {
                $query->where("mtb_translator_ikus.value", "LIKE", "%" . $search_self . "%");

            })->orWhereHas("mtb_translator_salary", function($query) use($search_self) {
                $query->where("mtb_translator_salaries.value", "LIKE", "%" . $search_self . "%");

            })->orWhereHas("translator_times", function($query) use($search_self) {
                $query->where("translator_times.translator_time","LIKE", "%" . $search_self . "%");

            })->orWhere("translator_self", "LIKE", "%" . $search_self . "%");
            ;
        }


	    return view("translator/search",[
    		'translators' => $Translators->get(),
    		"Mtb_translator_ikus" => Mtb_translator_iku::get(),
            "Mtb_translator_specialities" => Mtb_translator_speciality::get(),
            "Mtb_translator_salaries" => Mtb_translator_salary::get(),
            "search_info" => $search_info
    	]);

    }

}
