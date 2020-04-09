<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name');
            $table->char('phone_num', 10);
            $table->string('password');
            $table->string('icon_img');
            $table->boolean('crowd')->default(false);
            $table->string('current_status');
            $table->string('address');
            $table->integer('police_station_id')->unsigned();
            $table->foreign('police_station_id')->references('id')->on('police_stations');
            $table->double('lat', 15, 8);
            $table->double('lon', 15, 8);
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
        Schema::dropIfExists('stores');
    }
}
