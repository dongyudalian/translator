<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2018_09_14_040840_drop_foreignkey.php
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign('visitor_reservations_cost_id_foreign');
            $table->dropColumn('cost_id');
        });
=======

>>>>>>> 53a50170a54834d00586359cd19fc7cbf75c62dc:database/migrations/2018_09_14_010859_drop_foreignkey.php
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
