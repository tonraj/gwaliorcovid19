<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorisedHelpersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorised_helpers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->integer('police_station_id')->unsigned();
            $table->foreign('police_station_id')->references('id')->on('police_stations');
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
        Schema::dropIfExists('authorised_helpers');
    }
}
