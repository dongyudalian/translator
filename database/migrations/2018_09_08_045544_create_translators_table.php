<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('translator_salaries_id')->unsigned();
            $table->foreign('translator_salaries_id')->references('id')->on('translator_salaries');
            $table->string('email')->unique();
            $table->text('password');
            $table->integer('tel');
            $table->string('name');
            $table->string('city');
            $table->datetime('birthday');
            $table->integer('sex');
            $table->integer('license');
            $table->rememberToken();
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
        Schema::dropIfExists('translators');
    }
}
