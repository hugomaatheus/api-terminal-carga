<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('carman_id')->unsigned();
            $table->foreign('carman_id')->references('id')->on('carmen')->onDelete('cascade');
            $table->integer('start_x');
            $table->integer('start_y');
            $table->integer('destination_x');
            $table->integer('destination_y');
            $table->dateTime('travel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_logs');
    }
}
