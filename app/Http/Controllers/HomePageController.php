<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Translator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{

    public function home (Request $request)
    {
        $user = null;
        if(Auth::check()) {
            $user = Auth::user();
        }
        if(Auth::guard("visitor")->check()) {
            $user = Auth::guard("visitor")->user();
        }
        return view("/translator/homepage",
        [
            'user'=>$user,

        ]);
    }

    public function demo(Request $request, $ikus_id)
    {
        $tokyotranslators = Translator::query()->whereHas("mtb_translator_ikus", function($query) use($ikus_id){
            $query->where("mtb_translator_ikus.id", $ikus_id);
        })->get();


        // Tokyotranslator的排序
        $ordered_translaters = [];
        while(count($tokyotranslators) > 0) {

            $no = null;
            $max_value_this_time = 0;

            foreach ($tokyotranslators as $key => $tokyotranslator) {
                if($tokyotranslator->get_reservation_times() >= $max_value_this_time) {
                    $no = $key;
                    $max_value_this_time = $tokyotranslator->get_reservation_times();

                }
            }

            $ordered_translaters[] = $tokyotranslators[$no];

            if(count($ordered_translaters) >= 6) {
                break;
            }
            unset($tokyotranslators[$no]);
        }

            return response()->json([
                'ordered_translaters'=>$ordered_translaters,
            ]);

    }


}
