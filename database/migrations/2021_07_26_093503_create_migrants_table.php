<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMigrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('migrants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('passport_series');
            $table->string('passport_number');
            $table->string('birth_date');
            $table->string('phone');
            $table->string('FIO');
            $table->integer('region_id');
            $table->integer('city_id');
            $table->string('address');
            $table->integer('temp_region_id')->nullable();
            $table->integer('temp_city_id')->nullable();
            $table->string('temp_address')->nullable();
            $table->text('description');
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
        Schema::dropIfExists('migrants');
    }
}
