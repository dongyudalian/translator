<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslatorAndStaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translator_and_statures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('translators_id')->unsigned();
            $table->foreign('translators_id')->references('id')->on('translators');
            $table->integer('statures_id')->unsigned();
            $table->foreign('statures_id')->references('id')->on('mtb_translator_statures');
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
        Schema::dropIfExists('translator_and_statures');
    }
}
