<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslatorTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translator_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('translators_id')->unsigned();
            $table->foreign('translators_id')->references('id')->on('translators');
            $table->date('translator_time');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translator_times');
    }
}
