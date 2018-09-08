<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbTranslatorsTable extends Migration
{
    private $master_table_names = [
        'mtb_translator_specialities' =>array(
            array(
                "id" => 1,
                "value" => "生活",
                "rank" => 1
            ),
            array(
                "id" => 2,
                "value" => "商務",
                "rank" => 2
            )
        ),

        'mtb_translator_ikus' =>array(
            array(
                "id" => 1,
                "value" => "東京都",
                "rank" => 1
            ),
            array(
                "id" => 2,
                "value" => "大阪",
                "rank" => 2
            ),
            array(
                "id" => 3,
                "value" => "北海道",
                "rank" => 3
            ),
            array(
                "id" => 4,
                "value" => "沖縄",
                "rank" => 4
            ),
            array(
                "id" => 5,
                "value" => "横浜",
                "rank" => 5
            ),
            array(
                "id" => 6,
                "value" => "京都",
                "rank" => 6
            )
        ),

        'mtb_translator_statures' =>array(
            array(
                "id" => 1,
                "value" => "運動",
                "rank" => 1
            ),
             array(
                "id" => 2,
                "value" => "淑やか",
                "rank" => 2
            ),
              array(
                "id" => 3,
                "value" => "可愛い",
                "rank" => 3

            ),
              array(
                "id" => 4,
                "value" => "成熟",
                "rank" => 4
            )
        ),
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        foreach ($this->master_table_names as $tbl_name => $records) {

            Schema::create($tbl_name, function (Blueprint $table) {
                $table->increments('id');
                $table->text('value');
                $table->integer('rank');
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            });

            DB::table($tbl_name)->insert($records); // Query Builderでの方法
         }


     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        foreach ($this->master_table_names as $tbl_name => $table_contents) {
            Schema::dropIfExists($tbl_name);
        }
    }
}
