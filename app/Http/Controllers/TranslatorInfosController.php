<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Translator;
use Illuminate\Support\Facades\DB;
use App\Model\Mtb_translator_salary;
use App\Model\Translator_and_speciality;
use App\Model\Mtb_translator_speciality;


class TranslatorInfosController extends Controller
{
	public function index(Request $request,$id){
		if($request->isMethod("get")) {

            $id = $request->id;
            $translators = DB::table('translators')->where('id',$id)->get();
            $mtb_translator_salary = DB::table('mtb_translator_salaries')->where('id',$translators[0]->translator_salaries_id)->first();
            $translator_and_speciality = DB::table('translator_and_specialities')->where('translators_id',$translators[0]->id)->first();
        	$mtb_translator_speciality = DB::table('mtb_translator_specialities')->where('id',$translator_and_speciality->specialities_id)->first();

		return view("translator/translator_info",[
			"translator" => $translators[0],
			"mtb_translator_salary" => $mtb_translator_salary,
			"mtb_translator_speciality" => $mtb_translator_speciality,

		]);

		}
	}
}
