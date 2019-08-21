<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carmen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('age');   
            $table->string('gender');  
            $table->string('cnh');       
            $table->integer('vehicleKind');
            $table->boolean('full');
            $table->boolean('gotVehicle');
            $table->integer('truck_id')->unsigned();
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('cascade');
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
        Schema::dropIfExists('carmen');
    }
}
