<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visitor_id')->unsigned();
            $table->foreign('visitor_id')->references('id')->on('visitors');
            $table->integer('translator_id')->unsigned();
            $table->foreign('translator_id')->references('id')->on('translators');
            $table->integer('cost_id')->unsigned();
            $table->foreign('cost_id')->references('id')->on('translator_salaries');
            $table->text('reservation_comment')->nullable();
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
        Schema::dropIfExists('visitor_reservations');
    }
}
