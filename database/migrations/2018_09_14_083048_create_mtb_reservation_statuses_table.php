<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbReservationStatusesTable extends Migration
{
    private $master_table_names = [
        'mtb_reservation_statuses' =>array(
            array(
                "id" => 1,
                "value" => "承認待ち",
                "rank" => 1
            ),
             array(
                "id" => 2,
                "value" => "予約済み",
                "rank" => 2
            ),
              array(
                "id" => 3,
                "value" => "取り下げ",
                "rank" => 3

            ),
              array(
                "id" => 4,
                "value" => "期限切れ",
                "rank" => 4
            )
        ),
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    public function down()
    {
        foreach ($this->master_table_names as $tbl_name => $table_contents) {
            Schema::dropIfExists($tbl_name);
        }
    }
}
