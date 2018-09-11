<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertToMtbTranslatorSalaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $master_table_names = [
        'mtb_translator_salaries' =>array(
            array(
                "id" => 1,
                "value" => "1000円/時",
                "rank" => 1
            ),
            array(
                "id" => 2,
                "value" => "1500円/時",
                "rank" => 2
            ),
            array(
                "id" => 3,
                "value" => "2000円/時",
                "rank" => 3
            ),
            array(
                "id" => 4,
                "value" => "2500円/時",
                "rank" => 4
            ),
        ),
    ];

    public function up()
    {
        //

        foreach ($this->master_table_names as $tbl_name => $records) {
            DB::table($tbl_name)->insert($records);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
