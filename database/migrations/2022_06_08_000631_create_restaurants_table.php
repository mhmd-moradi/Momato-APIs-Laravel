<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Restaurants', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->integer('created_by');
            $table->string('restaurant_name');
            $table->string('location');
            $table->longtext('image');
            $table->string('opening_time');
            $table->string('closing_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Restaurants');
    }
}
