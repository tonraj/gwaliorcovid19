<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_services', function (Blueprint $table) {
            
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('address');
            $table->string('name');
            $table->char('phone', 10);
            $table->char('status', 15);
            $table->float('lat', 8);
            $table->float('lon', 8);
            $table->timestamp('end_time');
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
        Schema::dropIfExists('social_services');
    }
}
