<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Translator;
use Illuminate\Support\Facades\DB;
use App\Model\Mtb_translator_salary;
use App\Model\Translator_and_speciality;
use App\Model\Mtb_translator_speciality;
use Illuminate\Support\Facades\Storage;



class TranslatorInfosController extends Controller
{
	public function index(Request $request,$id){
		if($request->isMethod("get")) {

            $id = $request->id;
            $translators = DB::table('translators')->where('id',$id)->get();
            $mtb_translator_salary = DB::table('mtb_translator_salaries')->where('id',$translators[0]->translator_salaries_id)->first();
            $translator_and_specialities = DB::table('translator_and_specialities')->where('translators_id',$request->id)->get();

			$translator_and_speciality_specialities_ids = array();
      		foreach ($translator_and_specialities as $translator_and_speciality) {
      			$translator_and_speciality_specialities_ids[] = $translator_and_speciality->specialities_id;
      		}

			$mtb_translator_specialities = DB::table('mtb_translator_specialities')->whereIn('id',$translator_and_speciality_specialities_ids)->get();

			if($translators[0]->pictures =="/images/haruko.jpg"){
				$img_url = $translators[0]->pictures;
				
			}else{
				$img_url = Storage::url($translators[0]->pictures);
			}
			


		return view("translator/translator_info",[
			"translator" => $translators[0],
			"mtb_translator_salary" => $mtb_translator_salary,
			"translator_and_speciality" => $translator_and_speciality,
			"mtb_translator_specialities" =>$mtb_translator_specialities,
			"img_url" => $img_url

		]);

		}
	}
}
