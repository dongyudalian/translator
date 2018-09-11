<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRenamecolumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('mtb_translator_salaries', function (Blueprint $table) {
            $table->renameColumn('salary', 'value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('mtb_translator_salaries', function (Blueprint $table) {
            $table->renameColumn('salary', 'value');
        });
    }
}
